<x-app-layout>
@section('title', 'Kelola Soal Evaluasi')
@section('page-title', 'Kelola Soal Evaluasi')
@section('breadcrumb', 'Beranda / Kelola Soal Evaluasi')

<style>
    .card {
        background: var(--bg-card);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
    }
    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
    .card-title {
        font-size: 18px;
        font-weight: 600;
        color: var(--text-primary);
        margin: 0;
    }
    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: 500;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: background var(--transition);
        border: none;
        text-decoration: none;
        font-family: inherit;
    }
    .btn-primary {
        background: var(--accent);
        color: white;
    }
    .btn-primary:hover {
        background: var(--accent2);
    }
    .btn-danger {
        background: var(--danger);
        color: white;
    }
    .btn-warning {
        background: #f59e0b;
        color: white;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px 16px;
        text-align: left;
        border-bottom: 1px solid var(--border);
    }
    th {
        font-weight: 600;
        color: var(--text-primary);
        background: var(--bg-surface);
        font-size: 14px;
    }
    td {
        color: var(--text-secondary);
        font-size: 14px;
    }
    .badge {
        padding: 4px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    .badge-success { background: #dcfce7; color: #166534; }
    .badge-secondary { background: #f3f4f6; color: #4b5563; }
</style>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Soal Evaluasi</h2>
        <a href="{{ route('admin.evaluation-questions.create') }}" class="btn btn-primary">+ Tambah Soal</a>
    </div>

    @if(session('success'))
        <div style="background:#dcfce7; color:#166534; padding:12px 16px; border-radius:6px; margin-bottom:20px;">
            {{ session('success') }}
        </div>
    @endif

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th width="80">Urutan</th>
                    <th>Pertanyaan</th>
                    <th>Tipe Soal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($questions as $q)
                <tr>
                    <td style="font-weight: bold; text-align: center;">{{ $q->order_column }}</td>
                    <td style="font-weight: 500; color: var(--text-primary);">{{ $q->question }}
                        @if($q->type == 'radio' && $q->options)
                            <div style="font-size: 12px; color: #6b7280; margin-top: 4px;">Pilihan: {{ implode(', ', $q->options) }}</div>
                        @endif
                    </td>
                    <td>
                        @if($q->type == 'text') Teks Singkat
                        @elseif($q->type == 'number') Angka
                        @elseif($q->type == 'radio') Pilihan Ganda
                        @elseif($q->type == 'textarea') Teks Panjang (Paragraf)
                        @endif
                    </td>
                    <td>
                        @if($q->is_active)
                            <span class="badge badge-success">Aktif</span>
                        @else
                            <span class="badge badge-secondary">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex; gap:8px;">
                            <a href="{{ route('admin.evaluation-questions.edit', $q->id) }}" class="btn btn-warning" style="padding:6px 12px; font-size:12px;">Edit</a>
                            <form action="{{ route('admin.evaluation-questions.destroy', $q->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus soal ini?');" style="margin:0;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding:6px 12px; font-size:12px;">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" style="text-align:center; padding:32px; color:var(--text-muted);">
                        Belum ada soal. Silakan tambah soal baru.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
