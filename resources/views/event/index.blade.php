
@if(session()->has('success_msg'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session()->get('success_msg') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if(session()->has('alert_msg'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{ session()->get('alert_msg') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@if ($viewData["events"])
  <input type="date" id="date" placeholder="Filter by date...">
  <div id='results' class="row">
    @foreach ($viewData["events"] as $event)
      <div class="col-md-4 col-lg-3 mb-2">
        <div class="card">
          <div class="card-body text-center">
            <img src="{{$event->getImage()}}" class="img-fluid img-thumbnail" alt="event_image">
            <h2>{{$event->getTitle()}}</h2>
            <h3>{{$event->getLocation()}}</h3>
            <p>{{$event->getDescription()}}</p>
            <p>{{$event->getDate()}}</p>
          </div>