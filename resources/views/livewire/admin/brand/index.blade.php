<div>

@include('livewire.admin.brand.modal-form')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Brands List
                    <a href="#" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brands</a>
                </h4>
</div>

<div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Action</th>
</tr>
</thead>
<tbody>
    @forelse ($brands as $brand)
    <tr>
     <td> {{ $brand->id }} </td>
     <td> {{ $brand->name }} </td>
     <td>
        @if($brand->category)
        {{ $brand->category->name }}
        @else
        No Category
        @endif
</td>
     <td> {{ $brand->slug }} </td>
     <td> {{ $brand->status == '1' ? 'hidden':'visible' }} </td>
     <td>
<a href="" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" class="btn btn-sm btn-success">Edit</a>
<a href="" wire:click="deleteBrand({{$brand->id}})" class="btn btn-sm btn-danger"  data-bs-toggle="modal" data-bs-target="#deleteBrandModal">Delete</a>
     </td>
    </tr>
    @empty
    <tr>
        <td colspan="5">No Brands Found</td>
    </tr>
    @endforelse

</tbody>

</table>
</div>

{{ $brands->links() }}

</div>
</div>
</div>
</div>
@push('script')
<script>
window.addEventListener('close-modal', event => {
  $('#addBrandModal').modal('hide');
  $('#updateBrandModal').modal('hide');
  $('#deleteBrandModal').modal('hide');

})
</script>
@endpush