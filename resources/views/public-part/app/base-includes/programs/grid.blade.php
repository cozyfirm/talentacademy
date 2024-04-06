<div class="programs__grid">
    <div class="generic__header">
        <h2>{{ __('Program') }}</h2>
    </div>

    <div class="programs__grid_iw">
        @for($i=0; $i<6; $i++)
            <div class="pg__sample">
                <h1>Primijenjena muzika</h1>
                <div class="pg_sample__row">
                    <img src="{{ asset('files/images/public-part/presenter-icon.png') }}" alt="">
                    <h5>Damir Šagolj</h5>
                </div>
                <div class="pg_sample__row">
                    <img src="{{ asset('files/images/public-part/location-icon.png') }}" alt="">
                    <h5>Sala 3 / Grbavica</h5>
                </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s..</p>
            </div>
        @endfor
    </div>
    <div class="programs__grid_pagination">
        <div class="page-w page-1"> <p>1</p> </div>
        <div class="page-w page-2"> <p>2</p> </div>
        <div class="page-w page-3"> <p>3</p> </div>
    </div>
</div>
