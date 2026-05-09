<div class="mb-3">
    <label class="form-label text-light" for="name">Name</label>
    <input type="text" id="name" name="name" class="form-control bg-secondary bg-opacity-25 text-light border-secondary @error('name') is-invalid @enderror"
           value="{{ old('name', $pet['name'] ?? '') }}">
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label text-light" for="status">Status</label>
    <select id="status" name="status" class="form-select bg-secondary bg-opacity-25 text-light border-secondary @error('status') is-invalid @enderror">
        @foreach(['available', 'pending', 'sold'] as $option)
            <option value="{{ $option }}" {{ old('status', $pet['status'] ?? '') === $option ? 'selected' : '' }}>
                {{ $option }}
            </option>
        @endforeach
    </select>
    @error('status')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label text-light" for="photoUrls">Photo URL</label>
    <input type="url" id="photoUrls" name="photoUrls[0]" class="form-control bg-secondary bg-opacity-25 text-light border-secondary @error('photoUrls.0') is-invalid @enderror"
           value="{{ old('photoUrls.0', $pet['photoUrls'][0] ?? '') }}">
    @error('photoUrls.0')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label text-light" for="tag">Tag</label>
    <input type="text" id="tag" name="tags[0][name]" class="form-control bg-secondary bg-opacity-25 text-light border-secondary @error('tags.0.name') is-invalid @enderror"
           value="{{ old('tags.0.name', $pet['tags'][0]['name'] ?? '') }}">
    @error('tags.0.name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
