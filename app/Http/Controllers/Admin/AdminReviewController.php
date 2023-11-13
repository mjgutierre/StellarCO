<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Product;
use App\Models\Review;

class AdminReviewController extends Controller
{
  public function destroy(int $id): RedirectResponse
  {
    $review = Review::findOrFail($id);
    $review->delete();

    return redirect()->back()->with('success', trans('messages.reviewDeleted'));
  }
}
