<x-admin.quotes.form 
    button="{{ __('Save') }}" 
    title="{{ __('Share your favorite quote') }}" 
    :action="route('admin.quote.store',[app()->getLocale(),request('movie')])"
/>