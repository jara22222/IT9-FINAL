<div>
    <div class="table-responsive-lg ">
        <div class="table-viewer" id="tableContent" style="position: relative; max-height: 400px; overflow: auto;">
            <table class="table table-striped text-center shadow-sm ">
                <thead style="position: sticky; top: 0; background: white; z-index: 1;">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category #</th>
                        <th scope="col">Category name</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Updated_at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($categories as $category)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $category->ptid }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->created_at->format('F. j, Y : g:i A') }}</td>
                            <td>{{ $category->updated_at->format('F. j, Y : g:i A') }}</td>

                            <td class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $category->ptid }}">
                                    <i class="bi bi-pencil-square fs-6"></i>
                                </button>
                                <x-delete-button :route="route('delete-categories', ['ptid' => $category->ptid])" :category="$category" />

                            </td>
                        </tr>
                    @empty
                        <x-no-data />
                    @endforelse

                </tbody>
            </table>
            <x-edit_categories :categories="$categories" />
        </div>
    </div>

</div>
