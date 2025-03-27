@foreach($randomReviews as $randomReview)
    <div class="review-item text-center">
        <h3 class="font-weight-bold">
            {{ $randomReview->user->name ?? 'Ẩn danh' }}
        </h3>
        <p>{{ $randomReview->comment }}</p>
        <span class="position d-block mt-3">
            {{ $randomReview->created_at->format('d/m/Y') }}
        </span>
    </div>
@endforeach

< {{-- start phan trang --}}
<div class="d-flex justify-content-center">
    {{ $randomReviews->links('pagination::bootstrap-5') }}
</div>
{{-- End phân trang --}}
