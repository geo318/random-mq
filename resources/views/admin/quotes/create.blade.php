<x-admin.quotes.form 
    button="{{ __('main.save') }}" 
    title="{{ __('main.share_your_favorite_quote') }}" 
    :action="route('admin.quote.store',request('movie'))"
/>