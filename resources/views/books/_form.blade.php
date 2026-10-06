@php $b = $book ?? null; @endphp

<div class="mb-3">
    <label class="form-label">Judul</label>
    <input type="text" name="title" value="{{ old('title', $b->title ?? '') }}"
           class="form-control @error('title') is-invalid @enderror">
    @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Penulis</label>
    <input type="text" name="author" value="{{ old('author', $b->author ?? '') }}"
           class="form-control @error('author') is-invalid @enderror">
    @error('author') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label">Penerbit</label>
    <input type="text" name="publisher" value="{{ old('publisher', $b->publisher ?? '') }}"
           class="form-control @error('publisher') is-invalid @enderror">
    @error('publisher') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Tahun Terbit</label>
        <input type="number" name="year" value="{{ old('year', $b->year ?? '') }}"
               class="form-control @error('year') is-invalid @enderror">
        @error('year') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="form-label">Stok</label>
        <input type="number" name="stock" value="{{ old('stock', $b->stock ?? 0) }}"
               class="form-control @error('stock') is-invalid @enderror">
        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
<div class="mb-3">
    <label class="form-label">Kategori</label>
    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($categories as $c)
            <option value="{{ $c->id }}" @selected(old('category_id', $b->category_id ?? '') == $c->id)>{{ $c->name }}</option>
        @endforeach
    </select>
    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
</div>
<button class="btn btn-primary">Simpan</button>
<a href="{{ route('books.index') }}" class="btn btn-outline-secondary">Batal</a>