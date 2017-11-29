@extends("layouts.home")
@section("content")
<center><h1>List User Apply</h1></center>
<table id="customers">
  <tr>
    <th>Name</th>
    <th>Address</th>
    <th>Post Code</th>
    <th>No. Hp</th>
    <th>CV</th>
    <th>Status</th>
   <!--  <th>Action</th> -->
  </tr>
@foreach ($details as $detail)
    <tr>
        <td>
            {!! $detail->first_name!!}
        </td>
        <td>
            {!! $detail->address!!}
        </td>
        <td>
            {!! $detail->post!!}
        </td>
        <td>
            {!! $detail->no_hp!!}
        </td>
        <td>
            <a href="{{ URL::to( '/cv/'. $detail->upload)  }}" target="_blank"><b>Download CV</b></a>
        </td>
        <td>
            {!! $detail->status!!}
        </td>
        
    </tr>

 </table>
                <div class="col-xs-12 col-sm-4 emphasis">
                  
                    <div class="btn-group dropup btn-block">
                      <button type="button" class="btn btn-primary"><span class="fa fa-gear"></span> Options </button>
                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                      </button>
                      <ul class="dropdown-menu text-left" role="menu">
                        <li>{!! link_to(route('manages.change', $detail->user_id), 'Accept', ['class' => 'ButtonRead']) !!}</li>
                        <li class="divider"></li>
                        <li>{!! link_to(route('manages.reject', $detail->user_id), 'Reject', ['class' => 'ButtonRead']) !!}</li> 
                        <li class="divider"></li>
                        <li><a href="#" class="btn disabled" role="button"> Close </a></li>
                      </ul>
                    </div>
                </div>

@endforeach
@stop