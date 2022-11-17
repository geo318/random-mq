<x-admin.quotes.form 
    button="Update" 
    title="Edit your quote" 
    :action="route('admin.quote',[request('movie'),request('quote')])"
    :quote="\App\Models\Quote::find(request('quote'))->thumbnail"
    patch
/>