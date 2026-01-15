<h2>Admin Dashboard</h2>

<form method="POST" enctype="multipart/form-data">
@csrf
<input name="title" placeholder="Title">
<input name="category" placeholder="Category">
<input type="file" name="image">
<button>Add</button>
</form>

<hr>

@foreach($projects as $project)
    <p>{{ $project->title }}</p>
@endforeach
