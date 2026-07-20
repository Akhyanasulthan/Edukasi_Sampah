<x-app-layout>
@section('title', 'Tambah Soal Evaluasi')
@section('page-title', 'Tambah Soal Evaluasi')
@section('breadcrumb', 'Beranda / Kelola Soal / Tambah')

<style>
    .card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius); padding: 24px; max-width: 800px; }
    .form-group { margin-bottom: 20px; }
    .form-label { display: block; font-size: 14px; font-weight: 600; color: var(--text-primary); margin-bottom: 8px; }
    .form-control { width: 100%; padding: 10px 14px; border: 1px solid var(--border); border-radius: var(--radius-sm); font-size: 14px; color: var(--text-primary); background: var(--bg-surface); transition: border-color var(--transition); }
    .form-control:focus { outline: none; border-color: var(--accent); }
    .btn { display: inline-flex; align-items: center; justify-content: center; padding: 10px 20px; font-size: 14px; font-weight: 500; border-radius: var(--radius-sm); cursor: pointer; border: none; font-family: inherit; }
    .btn-primary { background: var(--accent); color: white; }
    .btn-secondary { background: var(--bg-surface); color: var(--text-primary); border: 1px solid var(--border); text-decoration: none; }
</style>

<div class="card">
    <form action="{{ route('admin.evaluation-questions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label">Pertanyaan</label>
            <input type="text" name="question" class="form-control" required value="{{ old('question') }}">
        </div>

        <div class="form-group">
            <label class="form-label">Tipe Soal</label>
            <select name="type" id="typeSelect" class="form-control" required>
                <option value="text">Teks Singkat</option>
                <option value="number">Angka</option>
                <option value="radio">Pilihan Ganda (Radio)</option>
                <option value="textarea">Teks Panjang (Paragraf)</option>
            </select>
        </div>

        <div class="form-group" id="optionsGroup" style="display: none;">
            <label class="form-label">Pilihan Jawaban (Pisahkan dengan koma)</label>
            <input type="text" name="options" class="form-control" placeholder="Contoh: Sangat Baik, Baik, Cukup, Kurang" value="{{ old('options') }}">
            <small style="color: #6b7280; font-size: 12px; margin-top: 4px; display:block;">Hanya diperlukan jika tipe soal adalah Pilihan Ganda.</small>
        </div>

        <div class="form-group">
            <label class="form-label">Urutan Tampil (Order)</label>
            <input type="number" name="order_column" class="form-control" value="0" required>
        </div>

        <div class="form-group" style="display: flex; align-items: center; gap: 8px;">
            <input type="checkbox" name="is_active" id="is_active" value="1" checked>
            <label for="is_active" style="font-size: 14px; color: var(--text-primary); cursor:pointer;">Aktifkan Soal Ini</label>
        </div>

        <div style="display: flex; gap: 12px; margin-top: 32px;">
            <button type="submit" class="btn btn-primary">Simpan Soal</button>
            <a href="{{ route('admin.evaluation-questions.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<script>
    document.getElementById('typeSelect').addEventListener('change', function() {
        if(this.value === 'radio') {
            document.getElementById('optionsGroup').style.display = 'block';
        } else {
            document.getElementById('optionsGroup').style.display = 'none';
        }
    });
</script>
</x-app-layout>
