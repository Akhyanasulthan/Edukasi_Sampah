<x-app-layout>
@section('title', 'Monitoring Hasil Evaluasi')
@section('page-title', 'Monitoring Hasil Evaluasi')
@section('breadcrumb', 'Beranda / Monitoring Evaluasi')

<style>
    .card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius); padding: 24px; margin-bottom: 24px; }
    .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
    .card-title { font-size: 18px; font-weight: 600; color: var(--text-primary); margin: 0; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 14px 16px; text-align: left; border-bottom: 1px solid var(--border); }
    th { font-weight: 600; color: var(--text-primary); background: var(--bg-surface); font-size: 13px; text-transform: uppercase; letter-spacing: 0.5px; white-space: nowrap; }
    td { color: var(--text-secondary); font-size: 14px; vertical-align: top; }
    .btn { padding: 8px 16px; background: var(--green-600, #16a34a); color: white; border-radius: var(--radius); text-decoration: none; font-size: 14px; font-weight: 600; border: none; cursor:pointer;}
</style>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">Daftar Hasil Evaluasi Pengunjung (Total: {{ $evaluations->count() }})</h2>
        <div style="display:flex; gap:10px;">
            <a href="{{ route('admin.evaluation-questions.index') }}" class="btn" style="background:var(--accent);">Kelola Soal Evaluasi</a>
            <a href="{{ route('admin.evaluations.export') }}" class="btn">Unduh Laporan (CSV)</a>
        </div>
    </div>

    <div style="overflow-x: auto;">
        <table>
            <thead>
                <tr>
                    <th>Waktu</th>
                    @foreach($questions as $q)
                        <th>{{ $q->question }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($evaluations as $eval)
                <tr>
                    <td style="white-space: nowrap;">{{ $eval->created_at->format('d M Y, H:i') }}</td>
                    
                    @php $answers = $eval->answers->keyBy('evaluation_question_id'); @endphp
                    
                    @foreach($questions as $q)
                        <td>
                            @if(isset($answers[$q->id]))
                                {{ $answers[$q->id]->answer }}
                            @else
                                -
                            @endif
                        </td>
                    @endforeach
                </tr>
                @empty
                <tr>
                    <td colspan="{{ $questions->count() + 1 }}" style="text-align:center; padding:40px; color:var(--text-muted);">
                        Belum ada pengunjung yang mengisi form evaluasi dengan format soal saat ini.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
