<?php
namespace App\Traits\Users;

use App\Models\User;

trait UserBaseTrait{
    protected array $_user_info = [];

    /**
     * Check for duplicate usernames
     *
     * @param $username
     * @return string
     */
    protected function usersByUsername($username) : string{
        try{
            $total = User::where('username', $username)->count();
            if($total == 0) return '';
            else return $total;
        }catch (\Exception $e){ return ''; }
    }

    /**
     * Extract slug by username
     *
     * @param $slug
     * @return string
     */
    public function getSlug($slug): string{
        $slug = str_replace('đ', 'd', $slug);
        $slug = str_replace('Đ', 'D', $slug);
        // $slug = preg_replace("/[^A-Za-z0-9 ]/", '', $slug);
        $slug = iconv('UTF-8', 'ISO-8859-1//TRANSLIT', $slug);
        $slug = iconv('UTF-8', 'ISO-8859-1//IGNORE', $slug);
        $slug = iconv('UTF-8', 'ISO-8859-1//TRANSLIT//IGNORE', $slug);

        $string = str_replace(array('[\', \']'), '', $slug);
        $string = preg_replace('/\[.*\]/U', '', $string);
        $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );
        $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);
        $string = strtolower(trim($string, '-'));

        return ($string . ($this->usersByUsername($string)));
    }

    /**
     * Get user full info (only my profile users)
     *
     * @param $user
     * @return array|false
     */
    public function getUserData($user): array | false{
        try{
            $this->_user_info =  [
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
                'email_verified_at' => $user->emailVerifiedAt(),
                'api_token' => $user->api_token,
                'role' => $user->role,
                'phone' => $user->phone,
                'birth_date' => $user->birthDate(),
                'address' => $user->address,
                'city' => $user->city,
                'country' => [
                    'name' => $user->countryRel->name_ba,
                    'code' => $user->countryRel->code,
                    'flag' => $user->countryRel->flag
                ],
                'about' => $user->about,
                'photo' => [
                    'hasPhoto' => isset($user->photo_uri),
                    'photo_uri' => $user->photo_uri,
                    'path' => '/files/images/public-part/users/'
                ],
                'social' => [
                    'instagram' => $user->instagram,
                    'facebook' => $user->facebook,
                    'twitter' => $user->twitter,
                    'linkedin' => $user->linkedin,
                    'web' => $user->web,
                ]
            ];

            if($user->role == 'presenter'){
                $this->_user_info['presenter'] = [
                    'title' => $user->title,
                    'institution' => $user->institution,
                    'presenter_role' => $user->presenter_role,
                    'short_description' => nl2br($user->short_description),
                    'description' => nl2br($user->description)
                ];
            }

            return $this->_user_info;
        }catch (\Exception $e){
            return false;
        }
    }
}
