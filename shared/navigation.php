<style>
.nav-pills {
  display: flex;
  justify-content: center;
}
</style>
<div class="container">
    <div class="text-center">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link <?php if ($CURRENT_PAGE == "Index") { ?>active<?php } ?>" href="index">Top news</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($CURRENT_PAGE == "Everything") { ?>active<?php } ?>" href="everything">Everything</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?php if ($CURRENT_PAGE == "Source") { ?>active<?php } ?>" href="source">Sources</a>
            </li>
        </ul>
    </div>  
</div>

