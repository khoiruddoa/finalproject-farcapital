<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>final-project</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                container: {
                    center: true,
                    screens: {
                        lg: "1170px",
                    },
                },
                extend: {
                    colors: {
                        clifford: "#da373d",
                        blues: "#217BF4",
                    },
                    fontFamily: {
                        inter: ["Inter"],
                    },
                },
            },
        };
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            input {
                font-family: "Inter";
            }

            #header .menu-navigation a,
            #header .menu-navigation a.active {
                font-style: normal;
                font-weight: 500;
                font-size: 14px;
                line-height: 14px;

                letter-spacing: 0.01em;

                color: #656464;
            }

            #header .menu-navigation a.active {
                font-weight: 600;
                color: #2b2b39;
            }

            .container {
                padding: 0 20px;
            }
        }
    </style>

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
    @livewireStyles
</head>

<body>

    <livewire:navbar />
    {{ $slot }}
    <livewire:footer />

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>


    @livewireScripts
</body>

</html>
