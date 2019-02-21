@extends("admin.master")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            @if(!$data['objects']->isEmpty())
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-pencil"></i> ویرایش {{$data['title_fa']}}
                        </div>
                        <div class="actions">
                            @include("admin.developer.component.link_dashboard")
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <form role="form" class="form-horizontal form-label-stripped"
                              action="{{route("admin.{$data['route']}.update")}}" method="post">
                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <br>
                            <div class="form-body">
                                @foreach($data['objects'] as $contact)
                                    <div class="form-group">
                                        @if($contact->name != 'lat'  && $contact->name != 'long' )
                                            <label for="{{$contact->name}}"
                                                   class="col-md-3 control-label myRequired">{{$contact->title}}
                                                :</label>
                                        @endif
                                        <div class="col-md-9">
                                            @if($contact->type == 'string' && $contact->name != 'lat'  && $contact->name != 'long' )
                                                <input maxlength="190" name="{{$contact->name}}" id="{{$contact->name}}"
                                                       type="text"
                                                       class="form-control @if($contact->name != 'address' ) myLink @endif "
                                                       placeholder="{{$contact->title}}"
                                                       value="{{$contact->value}}">
                                            @elseif($contact->type =='textarea' && $contact->name != 'lat'  && $contact->name != 'long' )
                                                <textarea class="form-control" name="{{$contact->name}}"
                                                          id="{{$contact->name}}" cols="30"
                                                          rows="10">{{$contact->value}}</textarea>
                                            @elseif($contact->name == 'lat'  || $contact->name == 'long' )
                                                <input name="{{$contact->name}}" maxlength=""
                                                       id="{{$contact->name}}Input" type="hidden"
                                                       value="{{$contact->value}}">
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <label for="tel" class="control-label col-lg-3 myRequired">نقشه:</label>
                                    <div class="col-lg-8">
                                        <div id="map" style="width: 100%; height: 400px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                @include('admin.developer.component.btn_update')
                                @include('admin.developer.component.btn_home')
                            </div>
                        </form>
                    </div>
                </div>
            @else
                @include('admin.partial.no_item')
            @endif
        </div>
    </div>
@endsection

@section("admin.setting",'active')
@section("admin.contact.edit",'active')

@section("editor")
    @include("admin.developer.editor.tinymce")
@endsection
@section('map')
    <script type="text/javascript"
            src='https://maps.google.com/maps/api/js?libraries=places&key=AIzaSyDZaZOS9IPKn3EhAlGWW0O7Hf43FKaH4Yw'></script>
    <script type="text/javascript" src="{{asset('assets/admin/plugins/map/locationpicker.jquery.min.js')}}"></script>
    <script type="text/javascript">
        var LatNumber = "{{mainSetting('lat')}}";
        var LongNumber = "{{mainSetting('long')}}";
        $('#map').locationpicker({
            location: {
                latitude: LatNumber,
                longitude: LongNumber
            },
            radius: 200,
            inputBinding: {
                latitudeInput: $('#latInput'),
                longitudeInput: $('#longInput')
            },
//            enableAutocomplete: true,
            markerIcon: '{{asset('assets/admin/plugins/map')}}/pin.png'
        });
    </script>
@endsection


