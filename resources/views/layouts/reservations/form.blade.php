<div class="form-group">
    <input type="hidden" class="form-control" name="schedule_id" value="{{ $schedule->id }}">
</div>

    <div class="form-group">
        <input id="first_name" type="text"
               class="form-control @error('first_name') is-invalid @enderror" name="first_name"
               value="{{ old('first_name') }}" autocomplete="first_name" autofocus placeholder="First Name">

        @error('first_name')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>

<div class="form-group">
    <input id="last_name" type="text"
           class="form-control @error('last_name') is-invalid @enderror" name="last_name"
           value="{{ old('last_name') }}" autocomplete="last_name" autofocus placeholder="Last Name">

    @error('last_name')
    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
    @enderror
</div>

<div class="form-group">

        <input id="mobile_number" type="text"
               class="form-control @error('mobile_number') is-invalid @enderror" name="mobile_number"
               value="{{ old('mobile_number') }}" autocomplete="mobile_number" autofocus placeholder="Mobile Number">

        @error('mobile_number')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>
<div class="form-group">
        <input id="ticket_number" type="text"
               class="form-control @error('ticket_number') is-invalid @enderror" name="ticket_number"
               value="{{ old('ticket_number') }}" autocomplete="ticket_number" autofocus placeholder="Ticket Number">

        @error('ticket_number')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>
<div class="form-group">
        <input id="seat_code" type="text"
               class="form-control @error('seat_code') is-invalid @enderror" name="seat_code"
               value="{{ old('seat_code') }}" autocomplete="seat_code" autofocus placeholder="Seat Code">

        @error('seat_code')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>

<div class="form-group">
    <label for="payment_date">Payment Date</label>
        <input id="payment_date" type="date"
               class="form-control @error('payment_date') is-invalid @enderror" name="payment_date"
               value="{{ old('payment_date') }}" autocomplete="payment_date">

        @error('payment_date')
        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
        @enderror
</div>

