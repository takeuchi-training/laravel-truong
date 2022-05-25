<nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item">
        <a class="page-link" href="?page={{ $currentPage == 1 ? 1 : $currentPage - 1 }}" aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>
        @if ($currentPage - $onEachSide > 1)
            <li class="page-item"><a class="page-link disabled" href="#">...</a></li>
        @endif
        @for ($page = 1; $page <= $lastPage; $page++)
            @if ($page >= $currentPage - $onEachSide && $page <= $currentPage + $onEachSide)
                <li class="page-item {{ $page == $currentPage ? 'active' : '' }}"><a class="page-link" href="?page={{ $page }}">{{ $page }}</a></li>
            @endif
        @endfor
        @if ($currentPage + $onEachSide < $lastPage)
            <li class="page-item"><a class="page-link disabled" href="#">...</a></li>
        @endif
      <li class="page-item">
        <a class="page-link" href="?page={{ $currentPage == $lastPage ? $lastPage : $currentPage + 1 }}" aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
    </ul>
  </nav>