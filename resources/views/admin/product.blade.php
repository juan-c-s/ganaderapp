@extends('layouts.app')

@section('content')

<!-- resources/views/your_view.blade.php -->

<div class="container mt-4">
    <div class="mb-4">
    <a href="{{route('admin.createProduct')}}" class="btn btn-md">
        <div class="bg-light rounded p-3">
        <h2 class="px-4 d-flex align-items-center mb-0">
            {{__('Create Product')}}
            <svg class="ml-2 text-success px-4  " xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 448 512">
                <path fill="currentColor" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/>
            </svg>
        </h2>
        </div>
    </a>

  
    </div>
    <div class="card">
        <table class="card-body table table-bordered">
            <thead class="card-title thead-dark">
                <tr>
                    <th>{{__('Title')}}</th>
                    <th>{{__('Category')}}</th>
                    <th>{{__('Price')}}</th>
                    <th>{{__('Supplier')}}</th>
                    <th>{{__('Rating')}}</th>
                    <th>{{__('Update')}}</th>
                    <th>{{__('Delete')}}</th>
                </tr>
            </thead>
            <tbody class="card-text">
                @foreach($viewData["products"] as $product)
                    <tr>
                        <td>{{ $product->getTitle() }}</td>
                        <td>{{ $product->getCategory() }}</td>
                        <td>{{ $product->getPrice() }}</td>
                        <td>{{ $product->getSupplier() }}</td>
                        <td>{{ $product->getRating() }}</td>
                        <td>
                            <a href="{{route('admin.updateProduct', ['id'=> $product->getId()])}}" class="btn btn-md"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></a>
                        </td>
                        <td>
                        <form method="POST" action="{{ route('admin.deleteProduct', ['id' => $product->getId()]) }}" onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-md bg-danger">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <!-- Font Awesome SVG path -->
                                    <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                </svg>
                            </button>
                        </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection