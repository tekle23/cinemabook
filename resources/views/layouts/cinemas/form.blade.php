
    <div class="form-group">
        <input id="name" type="text"
               class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ old('name') }}" autocomplete="name" autofocus placeholder="name">

        @error('name')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>


<div class="form-group">

        <input id="telephone" type="text"
               class="form-control @error('telephone') is-invalid @enderror" name="telephone"
               value="{{ old('telephone') }}" autocomplete="telephone" autofocus placeholder="telephone">

        @error('telephone')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>

<div class="form-group">

        <input id="address" type="text"
               class="form-control @error('address') is-invalid @enderror" name="address"
               value="{{ old('address') }}" autocomplete="address" autofocus placeholder="address">

        @error('address')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>
<div class="form-group">

        <input id="seat_limit" type="text"
               class="form-control @error('album') is-invalid @enderror" name="seat_limit"
               value="{{ old('seat_limit') }}" autocomplete="seat_limit" placeholder="Seat Limit">

        @error('seat_limit')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>
<div class="form-group">
        <input id="photo" type="file"
               class="form-control @error('photo') is-invalid @enderror" name="photo"
               value="{{ old('photo') }}" autocomplete="photo" autofocus placeholder="photo">

        @error('photo')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>
</div>
