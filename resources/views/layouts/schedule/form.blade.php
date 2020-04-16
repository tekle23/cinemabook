<div class="form-group">
    <label>Select Cinemas</label>
    <select class="form-control" name="cinema_id">
        <option value="">Select Cinema</option>
            @foreach($cinemas as $cinema)
            <option value="{{$cinema->id}}">{{$cinema->name}}</option>
            @endforeach
    </select>
  </div>
    <div class="form-group">
        <input id="movie_title" type="text"
               class="form-control @error('movie_title') is-invalid @enderror" name="movie_title"
               value="{{ old('movie_title') }}" autocomplete="movie_title" autofocus placeholder="movie title">

        @error('movie_title')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>


<div class="form-group">
    <label for="show_date">Show Date</label>
        <input id="show_date" type="date"
               class="form-control @error('show_date') is-invalid @enderror" name="show_date"
               value="{{ old('show_date') }}" autocomplete="show_date" autofocus placeholder="show date">

        @error('show_date')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>

<div class="form-group">
    <label for="show_time">Show Time</label>
        <input id="show_time" type="time"
               class="form-control @error('show_time') is-invalid @enderror" name="show_time"
               value="{{ old('show_time') }}" autocomplete="show_time" autofocus placeholder="show time">

        @error('show_time')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>
<div class="form-group">
    <label for="album">Album photo</label>
        <input id="album" type="file"
               class="form-control @error('album') is-invalid @enderror" name="album"
               value="{{ old('album') }}" autocomplete="album">

        @error('album')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>
<div class="form-group">
    <label>Select Characters</label>
    <select class="form-control select2" multiple="" data-placeholder="Select categories"
                    style="width: 100%;" tabindex="-1" name="characters[]" aria-hidden="true">
                    @foreach ($characters as $character)
                    <option value="{{ $character->id }}">{{ $character->full_name }}</option>

                    @endforeach

    </select>

  </div>

