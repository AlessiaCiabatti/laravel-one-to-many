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
                <a class="text-white cta" href="{{ route('admin.projects.index') }}">
                    <i class="fa-solid fa-diagram-project"></i>
                    <span>Projects</span>

                </a>
            </li>

            <li>
                <a class="text-white cta" href="{{ route('admin.projects.create') }}">
                    <i class="fa-solid fa-diagram-project"></i>
                    <span>New Projects</span>

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
