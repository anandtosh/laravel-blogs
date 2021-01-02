<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading">Start Bootstrap </div>
    <div class="list-group list-group-flush">
        @foreach ($categories as $item)
        <a href="{{forsite('site-post',['post'=>'second'])}}" class="list-group-item list-group-item-action bg-light">{{Str::title($item->title)}}</a>
        @endforeach
    </div>
  </div>
  <!-- /#sidebar-wrapper -->

@push('js')
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>
@endpush
