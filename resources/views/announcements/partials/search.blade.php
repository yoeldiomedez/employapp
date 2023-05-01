{{ html()->form('GET', route('announcements.index'))->class(['form-inline'])->open() }}
    <div class="form-group">
        {{ html()->select(
            'month', 
            [
                '01' => 'ENERO', 
                '02' => 'FEBRERO',
                '03' => 'MARZO',
                '04' => 'ABRIL',
                '05' => 'MAYO', 
                '06' => 'JUNIO',
                '07' => 'JULIO',
                '08' => 'AGOSTO',
                '09' => 'SEPTIEMBRE', 
                '10' => 'OCTUBRE',
                '11' => 'NOVIEMBRE',
                '12' => 'DICIEMBRE'
            ], 
            $month
            )->required()->class(['form-control', 'selectpicker'])
        }}
    </div>

    <div class="form-group">
        {{ html()->select(
            'year', 
            [
                date('Y')-1 => date('Y')-1,
                date('Y') => date('Y')
            ], 
            $year
            )->required()->class(['form-control', 'selectpicker'])
        }}    
    </div>

    <button type="submit" class="btn purple btn-outline">
        Buscar <i class="fa fa-search"></i>
    </button>

{{ html()->form()->close() }}