<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" value="{{ old('name') ?? $course->name }}" class="form-control">
    @error('name')
    <small class="text-danger">{{$message}}</small>
    @enderror</div>

<div class="form-group">
    <label for="couch_name">Couch.Name</label>
    <input type="text" name="couch_name" value="{{ old('couch_name') ?? $course->couch_name }}" class="form-control">
    @error('couch_name')
    <small class="text-danger">{{$message}}</small>
    @enderror</div>
<div class="form-group">
    <label for="summary">summary</label>
    <input type="text" name="summary" value="{{ old('summary') ?? $course->summary }}" class="form-control">
    @error('summary')
    <small class="text-danger">{{$message}}</small>
    @enderror</div>
<div class="form-group">
    <label for="details">Details</label>
    <textarea class="form-control" id="details" rows="3"
              name="details">{{old('details')??$course->details}}</textarea>
    @error('details')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group d-flex flex-column">
    <label for="image">Profile Image</label>
    <input type="file" name="image" class="py-2">
    @error('image')
    <small class="text-danger">{{$message}}</small>
    @enderror</div>

<div class="form-group">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select customer status</option>

        @foreach($course->activeOptions() as $activeOptionKey => $activeOptionValue)
            <option
                value="{{ $activeOptionKey }}" {{ $course->active == $activeOptionValue ? 'selected' : '' }}>{{ $activeOptionValue }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="classification_id">Course</label>
    <select name="classification_id" class="form-control">
        @foreach ($classifications as $classification)
            <option
                value="{{ $classification->id }}" {{ $classification->id == $course->classification_id ? 'selected' : '' }}>{{ $classification->name }}</option>
        @endforeach
    </select>
</div>


@csrf
