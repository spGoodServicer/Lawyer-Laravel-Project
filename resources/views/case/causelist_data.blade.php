<table class="table table-striped dt">
    <thead>
    <tr>

        <th class="text-center" scope="col">{{ __('common.SL') }}</th>
        <th>{{ __('case.Case') }}</th>
        <th>{{ __('case.Client') }}</th>
        <th>{{ __('case.Details') }}</th>
        <th class="noprint">{{ __('common.Actions') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($models as $model)
        <tr>
            <td class="text-center">{{ $loop->index + 1 }}</td>
            <td>
                <b>{{ __('case.Case No.') }}: </b> {{$model->case_category? $model->case_category->name : '' }}/{{$model->case_no}} <br>
                <a href="{{route('category.case.show', $model->case_category_id)}}"><b>{{ __('case.Category') }}: </b> {{$model->case_category? $model->case_category->name : '' }}</a>  <br>
                <a href="{{ route('case.show', $model->id) }}"><b>{{ __('case.Title') }}: </b>{{ $model->title }}
                </a>
                <br>
                <b>{{ __('case.Next Hearing Date') }}: </b> {{ date('d, F Y',strtotime($model->hearing_date)) }} <br>
                <b>{{ __('case.Filing Date') }}: </b> {{ date('d, F Y',strtotime($model->filling_date)) }}
            </td>
            <td>
                @if($model->client == 'Plaintiff' and $model->plaintiff_client)
                    <a href="{{route('client.show', $model->plaintiff_client->id)}}"><b>{{ __('case.Name') }}</b>: {{ $model->plaintiff_client->name }}</a> <br>
                    <b>{{ __('case.Mobile') }}: </b> {{ $model->plaintiff_client->mobile }} <br>
                    <b>{{ __('case.Email') }}: </b> {{ $model->plaintiff_client->email }} <br>
                    <b>{{ __('case.Address') }}: </b> {{ $model->plaintiff_client->address }}
                    {{ $model->plaintiff_client->district ? ', '. $model->plaintiff_client->district->name : '' }}
                    {{ $model->plaintiff_client->division ? ', '. $model->plaintiff_client->division->name : '' }}
                @elseif($model->client == 'Opposite' and $model->opposite_client)
                    <a href="{{route('client.show', $model->opposite_client->id)}}"><b>{{ __('case.Name') }}</b>: {{ $model->opposite_client->name }}</a> <br>
                    <b>{{ __('case.Mobile') }}: </b> {{ $model->opposite_client->mobile }} <br>
                    <b>{{ __('case.Email') }}: </b> {{ $model->opposite_client->email }} <br>
                    <b>{{ __('case.Address') }}: </b> {{ $model->opposite_client->address }}
                    {{ $model->opposite_client->district ? ', '. $model->opposite_client->district->name : '' }}
                    {{ $model->opposite_client->division ? ', '. $model->opposite_client->division->name : '' }}
                @endif
            </td>
            <td>
                @if($model->court)
                    <a href="{{route('master.court.show', $model->court_id)}}"><b>{{ __('case.Court') }}</b>: {{ $model->court->name}} </a><br>
                    <a href="{{route('category.court.show', $model->court_category_id)}}"> <b>{{ __('case.Category') }}</b>: {{ $model->court->court_category ? $model->court->court_category->name : '' }} </a><br>
                    <b>{{ __('case.Room No') }}: </b> {{ $model->court->room_number }} <br>
                    <b>{{ __('case.Address') }}: </b> {{ $model->court->location }}
                    {{ $model->court->district ? ', '. $model->court->district->name : '' }}
                    {{ $model->court->division ? ', '. $model->court->division->name : '' }}
                @endif
            </td>

            <td>


                <div class="dropdown CRM_dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button"
                            id="dropdownMenu2" data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">
                        {{ __('common.Select') }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">

                        <a href="{{ route('case.show', $model->id) }}" class="dropdown-item"><i class="fa fa-eye"></i> {{ __('common.View') }}</a>
                        @if(!$model->judgement)
                            <a href="{{route('case.edit', $model->id)}}" class="dropdown-item"><i class="fa fa-pencil"></i> {{ __('common.Edit') }}</a>
                            <a href="{{route('date.create', ['case' => $model->id])}}" class="dropdown-item"><i
                                    class="fa fa-calendar"></i> {{ __('case.New Date') }}</a>
                            <a href="{{route('putlist.create', ['case' => $model->id])}}" class="dropdown-item"><i
                                    class="fa fa-calendar"></i> {{ __('case.New Put Up Date') }}</a>
                            <a href="{{route('judgement.create', ['case' => $model->id])}}" class="dropdown-item"><i
                                    class="fa fa-calendar"></i> {{ __('case.New Judgement Date') }}</a>
                        @endif

                    </div>
                </div>


            </td>
        </tr>
    @endforeach
    </tbody>
</table>
