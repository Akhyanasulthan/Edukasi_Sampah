<x-app-layout>
@section('title', 'Monitoring Hasil Evaluasi')
@section('page-title', 'Monitoring Hasil Evaluasi')
@section('breadcrumb', 'Beranda / Monitoring Evaluasi')

<style>
    .card { 
        background: var(--bg-card); 
        border: 1px solid var(--border); 
        border-radius: var(--radius); 
        padding: 30px; 
        margin-bottom: 24px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.02);
    }
    
    .card-header { 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        margin-bottom: 28px; 
        flex-wrap: wrap;
        gap: 16px;
    }
    
    .card-title { 
        font-size: 20px; 
        font-weight: 700; 
        color: var(--text-primary); 
        margin: 0; 
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .table-container {
        border: 1px solid var(--border);
        border-radius: 12px;
        overflow: hidden;
        overflow-x: auto;
    }
    
    table { 
        width: 100%; 
        border-collapse: collapse; 
    }
    
    th, td { 
        padding: 16px 20px; 
        text-align: left; 
        border-bottom: 1px solid var(--border); 
        vertical-align: middle;
    }
    
    th { 
        font-weight: 600; 
        color: var(--text-secondary); 
        background: #f9fafb; 
        font-size: 13px; 
        text-transform: uppercase; 
        letter-spacing: 0.5px; 
        white-space: nowrap; 
    }
    
    tr:last-child td { border-bottom: none; }
    
    tbody tr { transition: background 0.2s; }
    tbody tr:hover { background: #f3f4f6; }
    
    td { 
        color: var(--text-primary); 
        font-size: 14.5px; 
        line-height: 1.5;
    }
    
    .date-badge {
        display: inline-block;
        padding: 6px 12px;
        background: #ecfdf5;
        color: #059669;
        border-radius: 20px;
        font-size: 12.5px;
        font-weight: 600;
        white-space: nowrap;
    }

    .btn { 
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 18px; 
        background: var(--accent); 
        color: white; 
        border-radius: 8px; 
        text-decoration: none; 
        font-size: 14px; 
        font-weight: 600; 
        border: none; 
        cursor: pointer;
        transition: all 0.2s;
        box-shadow: 0 4px 10px var(--accent-glow);
    }
    
    .btn:hover {
        background: var(--accent2);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px var(--accent-glow);
    }
    
    .btn-outline {
        background: white;
        color: var(--text-primary);
        border: 1px solid var(--border);
        box-shadow: 0 2px 4px rgba(0,0,0,0.02);
    }
    
    .btn-outline:hover {
        background: #f9fafb;
        color: var(--accent);
        border-color: var(--accent);
        transform: translateY(-2px);
    }
    
    .answer-text {
        max-width: 250px;
        white-space: normal;
        word-wrap: break-word;
    }
</style>

<div class="card">
    <div class="card-header">
        <h2 class="card-title">
            <span style="background: var(--accent-glow); color: var(--accent); padding: 8px; border-radius: 8px; display: flex;">
                📈
            </span>
            Hasil Evaluasi Pengunjung
            <span style="font-size:14px; color:var(--text-muted); font-weight:500; margin-left:8px;">({{ $evaluations->count() }} Data)</span>
        </h2>
        <div style="display:flex; gap:12px;">
            <a href="{{ route('admin.evaluation-questions.index') }}" class="btn btn-outline">
                <span>✏️</span> Kelola Soal
            </a>
            <a href="{{ route('admin.evaluations.export') }}" class="btn">
                <span>📥</span> Unduh CSV
            </a>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Waktu Pengisian</th>
                    @foreach($questions as $q)
                        <th>{{ $q->question }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @forelse($evaluations as $eval)
                <tr>
                    <td>
                        <div class="date-badge">
                            {{ $eval->created_at->format('d M Y, H:i') }}
                        </div>
                    </td>
                    
                    @php $answers = $eval->answers->keyBy('evaluation_question_id'); @endphp
                    
                    @foreach($questions as $q)
                        <td class="answer-text">
                            @if(isset($answers[$q->id]))
                                {{ $answers[$q->id]->answer }}
                            @else
                                <span style="color:var(--text-muted); font-style:italic;">Kosong</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
                @empty
                <tr>
                    <td colspan="{{ $questions->count() + 1 }}" style="text-align:center; padding:60px 20px; color:var(--text-muted);">
                        <div style="font-size:40px; margin-bottom:16px; opacity:0.5;">📭</div>
                        <div style="font-size:16px; font-weight:600; color:var(--text-primary); margin-bottom:8px;">Belum ada data evaluasi</div>
                        <div>Belum ada pengunjung yang mengisi form evaluasi dengan format soal saat ini.</div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>
