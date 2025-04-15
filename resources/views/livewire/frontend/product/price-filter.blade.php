<div class="sidebar-item mb-40">
    <h4 class="small-title">Price</h4>
    <div class="sidebar-body">
        <div class="sidebar-price-range">
            <div class="slider-labels">
                <div class="caption">
                    <span id="slider-range-value1">{{ $selectedMinPrice }}</span>
                </div>
                <span class="range-separator"> — </span>
                <div class="caption">
                    <span id="slider-range-value2">{{ $selectedMaxPrice }}</span>
                </div>
            </div>
            <div id="slider-range"></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        var minPrice = @json($minPrice);
        var maxPrice = @json($maxPrice);

        $('#slider-range').slider({
            range: true,
            min: minPrice,
            max: maxPrice,
            values: [minPrice, maxPrice],
            slide: function (event, ui) {
                @this.set('selectedMinPrice', ui.values[0]);
                @this.set('selectedMaxPrice', ui.values[1]);
            }
        });
    });
</script>
@endpush
