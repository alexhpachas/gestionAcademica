
<div class="bg-white shadow-md rounded">
    <table class="min-w-full sm:table table-responsive">
        <thead>
            <tr style="background-color: {{$templates->color_tabla}}" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-full divide-x divide-white" {{-- class="text-gray-500 border-black uppercase text-sm font-medium tracking-wider divide-x-2 divide-gray-100" --}}>
                {{ $head }}
            </tr>
        </thead>

        <tbody class=" text-sm font-light">
            {{ $body }}
        </tbody>

    </table>
    
</div>
