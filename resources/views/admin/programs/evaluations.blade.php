@extends('admin.layout.layout')
@section('c-icon') <i class="fas fa-file-alt"></i> @endsection
@section('c-title') {{ __('Evoluacije') }} @endsection
@section('c-breadcrumbs')
    <a href="#"> <i class="fas fa-home"></i> <p>{{ __('Dashboard') }}</p> </a> / <a href="{{ route('system.admin.programs.evaluations') }}">{{ __('Evoluacije') }}</a>
@endsection
@section('c-buttons')
    <a href="{{ route('system.admin.programs.evaluations') }}">
        <button class="pm-btn btn btn-dark"> <i class="fas fa-star"></i> </button>
    </a>
@endsection

@section('content')
    <div class="content-wrapper content-wrapper-p-15">
        @foreach($programs as $program)
            <h1> {{ $program->title }} </h1>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col" width="40px" class="text-center">#</th>
                    <th scope="col">Session</th>
                    <th scope="col">User</th>
                    @foreach($questions as $question)
                        <th scope="col"> {{ $question->question ?? '' }} </th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                @php $counter = 1 @endphp
                @foreach($program->sessionsRel as $session)
                    <?php
                        $users = \App\Models\Programs\ProgramSessionEvaluation::where('session_id', '=', $session->id)->get()->unique('attendee_id');
                    ?>
                    @foreach($users as $user)
                        <?php
                            $first = \App\Models\Programs\ProgramSessionEvaluation::where('session_id', '=', $session->id)->where('attendee_id', '=', $user->attendee_id)->where('question_id', 1)->first();
                            $second = \App\Models\Programs\ProgramSessionEvaluation::where('session_id', '=', $session->id)->where('attendee_id', '=', $user->attendee_id)->where('question_id', 2)->first();
                            $third = \App\Models\Programs\ProgramSessionEvaluation::where('session_id', '=', $session->id)->where('attendee_id', '=', $user->attendee_id)->where('question_id', 3)->first();
                            $forth = \App\Models\Programs\ProgramSessionEvaluation::where('session_id', '=', $session->id)->where('attendee_id', '=', $user->attendee_id)->where('question_id', 6)->first();
                            $fifth = \App\Models\Programs\ProgramSessionEvaluation::where('session_id', '=', $session->id)->where('attendee_id', '=', $user->attendee_id)->where('question_id', 7)->first();
                        ?>
                        <tr>
                            <th scope="row" class="text-center">{{ $counter++ }}. </th>
                            <td > {{ $session->title ?? '' }} </td>
                            <td> {{ $user->attendeeRel->name ?? '' }} </td>
                            <td> @if(isset($first->answerRel)) {{ $first->answerRel->answer ?? '' }} @else {{ $first->answer ?? '' }} @endif </td>
                            <td> @if(isset($second->answerRel)) {{ $second->answerRel->answer ?? '' }} @else {{ $second->answer ?? '' }} @endif </td>
                            <td> @if(isset($third->answerRel)) {{ $third->answerRel->answer ?? '' }} @else {{ $third->answer ?? '' }} @endif </td>
                            <td> @if(isset($forth->answerRel)) {{ $forth->answerRel->answer ?? '' }} @else {{ $forth->answer ?? '' }} @endif </td>
                            <td> @if(isset($fifth->answerRel)) {{ $fifth->answerRel->answer ?? '' }} @else {{ $fifth->answer ?? '' }} @endif </td>
                        </tr>
                    @endforeach

                @endforeach
                </tbody>
            </table>


        @endforeach
    </div>
@endsection
