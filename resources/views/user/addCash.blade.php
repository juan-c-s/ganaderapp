<div class="modal fade" id="infoModal{{$viewData['user']->getId()}}" tabindex="-1" aria-hidden="true" aria-labelledby="infoModalLabel{{$viewData['user']->getId()}}">
    <div class="modal-lg modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add the amount you want to add to your wallet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('user.addCash') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="number" class="form-control mb-2" name="wallet" value="{{ old('wallet') }}" />
                    <input type="hidden" name="user_id" value="{{Auth::user()->getId()}}" />
                    <input type="submit" class="btn btn-primary" value="Save Changes" />
            </div>
        </div>
    </div>
</div>