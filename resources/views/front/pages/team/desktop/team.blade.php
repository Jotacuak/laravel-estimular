<div class="personal">

    <div class="personal-element">
        <div class="two-columns">
            <div class="column">
                <div class="personal-element-photo profile-photo">
                    <img src="{{Storage::url($worker->image_featured_desktop->path)}}" alt="Job Plaza">
                </div>
            </div>
            <div class="column">
                <div class="personal-element-txt profile-txt">
                    {!!$worker->locale['description']!!}
                </div>
            </div>
        </div>
    </div>
    
</div>