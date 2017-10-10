<h1>list_events</h1>

<ul>

    @foreach($incidences as $incidence)
        <li>Title: {{$incidence->title}}</li>
        <li>Description: {{$incidence->description}}</li>

    @endforeach
</ul>