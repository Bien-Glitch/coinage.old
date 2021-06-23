<!-- Modal -->
<div class="modal fade" id="show-offer-modal" tabindex="-1" role="dialog" aria-labelledby="show-offer-modal" aria-hidden="true">
    <div class="modal-xl modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">View Offer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('offers.update', $offer->id) }}" method="POST" class="gy-3" id="update-offer-form" name="update-offer-form">
                    @csrf
                    @method('patch')
                    <x-offer-form :offer="$offer" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger delete-offer" data-uri="{{ route('offers.destroy', $offer->id) }}">Delete</button>
                <button type="submit" class="btn btn-primary" form="update-offer-form">Save</button>
            </div>
        </div>
    </div>
</div>
