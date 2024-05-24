{{-- <aside class="text-white">
    <div class="dashboard">
        <h5 class="my_db">
            <span>My</span> Dashboard
        </h5>
    </div>

    <div>
        <ul>
          <li>
            <span></span><span></span><span></span><span></span>
            <a class="text-white" href="{{ route('admin.home') }}">
              <i class="fa-solid fa-house"></i>
              Home
            </a>
          </li>

          <li>
            <span></span><span></span><span></span><span></span>
            <a class="text-white" href="#">
              <i class="fa-solid fa-diagram-project"></i>
              Categories
            </a>
          </li>

          <li>
            <span></span><span></span><span></span><span></span>
            <a class="text-white" href="{{ route('admin.technologies.index') }}">
              <i class="fa-solid fa-keyboard"></i>
              Technologies
            </a>
          </li>

          <li>
            <span></span><span></span><span></span><span></span>
            <a class="text-white" href="{{ route('admin.types.index') }}">
              <i class="fa-solid fa-keyboard"></i>
              Types
            </a>
          </li>
        </ul>
      </div>
</aside> --}}

<aside class="text-white">
    <div class="dashboard">
        <h4 class="my_db">
            <span>My</span> Dashboard
        </h4>
    </div>

    <div>
        <ul>
            <li>
                <a class="text-white cta" href="{{ route('admin.home') }}">
                    <i class="fa-solid fa-house"></i>
                    <span>Home</span>
                </a>
            </li>

            <li>
                <a class="text-white cta" href="#">
                    <i class="fa-solid fa-diagram-project"></i>
                    <span>Categories</span>

                </a>
            </li>

            <li>
                <a class="text-white cta" href="{{ route('admin.technologies.index') }}">
                    <i class="fa-solid fa-keyboard"></i>
                    <span>Technologies</span>

                </a>
            </li>

            <li>
                <a class="text-white cta" href="{{ route('admin.types.index') }}">
                    <i class="fa-solid fa-swatchbook"></i>
                    <span>Types</span>

                </a>
            </li>
        </ul>
    </div>
</aside>
