<?php
namespace App\Traits\Users;

use App\Models\User;
use Illuminate\Http\Request;

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
    public function getUserData($user, $fullData = false): array | false{
        try{
            $this->_user_info =  [
                'name' => $user->name,
                'username' => $user->username,
                'email' => $user->email,
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

            /**
             *  If we need full user data, then append to it
             */
            if($fullData){
                $this->_user_info['email_verified_at'] = $user->emailVerifiedAt();
                $this->_user_info['api_token'] = $user->api_token;
            }

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

    /**
     * Get user basic data (not hidden ones)
     * @param $user
     * @return array|false
     */
    public function getUserBasicData($user): array | false{
        try{
            $this->_user_info =  [
                'name' => $user->name,
                'username' => $user->username,
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

    /**
     * Password check
     *
     * @param Request $request
     * @param $code
     * @return array|string[]
     */
    protected function passwordCheck(Request $request, string $code = '5032'): array {
        try{
            if(!isset($request->password)) throw new \Exception(__('Lozinka ne može biti prazna'), $code);
            if (strlen($request->password) < 8) throw new \Exception(__('Lozinka mora sadržavati minimalno 8 karaktera'), $code);
            if (!preg_match("/\d/", $request->password)) throw new \Exception(__('Lozinka mora sadržavati minimalno jednu cifru'), $code);
            if (!preg_match("/[A-Z]/", $request->password) and !preg_match("/[a-z]/", $request->password)) throw new \Exception(__('Lozinka mora sadržavati karaktere'), $code);
            if (!preg_match("/\W/", $request->password)) throw new \Exception(__('Lozinka mora sadržavati minimalno jedan specijalni karakter'), $code);

            return ["code" => "0000", "message" => "OK!"];
        }catch (\Exception $e){
            return ["code" => $e->getCode(), "message" => $e->getMessage()];
        }
    }
}
