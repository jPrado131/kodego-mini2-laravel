<div>
    <h1>Real-Time Data</h1>
    
    <ul>
        @foreach ($messages as $message)
            <li>{{ $message->content }}</li>
        @endforeach
    </ul>
    
    @livewireScripts
    <script>
        Livewire.on('refreshData', function () {
            console.log('refreshData event triggered');
            @this.fetchNewData();
        });
    </script>
</div>
