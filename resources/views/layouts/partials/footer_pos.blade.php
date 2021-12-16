<!-- Main Footer -->
  <footer class="no-print text-center text-info pos-footer">
    <!-- To the right -->
    <!-- <div class="pull-right hidden-xs">
      Anything you want
    </div> -->
    <!-- Default to the left -->
    <img src="{{asset('/img/line-scratsh.png')}}" alt="footer line" class="footer-scratsh-line">
    <div class="cyan-bg ">
      <small>
        <b>{{ config('app.name', 'ultimatePOS') }} - V{{config('author.app_version')}} | Copyright &copy; {{ date('Y') }} All rights reserved.</b>
      </small>
    </div>
    
</footer>