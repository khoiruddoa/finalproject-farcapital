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



    <section id="hero" class="pt-[90px] bg-gradient-to-tl from-[#D4E7FE] to-[#ffffff] border-b-[1px]">
        <div class="container flex flex-wrap-reverse lg:flex-nowrap justify-center lg:justify-between items-center">
            <div
                class="left lg:w-[515px] lg:h-[370px] mt-[125px] flex flex-col justify-center items-center lg:justify-start lg:items-start">

                <div
                    class="solution mb-[18px] font-[700] text-[56px] leading-[66px] mt-[-10px] text-center lg:text-left">
                    Jual hasil tanimu disini
                </div>
                <div
                    class="more mb-[42px] font-[400px] text-[18px] leading-[28px] text-[#656464] lg:w-[491px] lg:text-left text-center">
                    Harga kamu yang tentukan. pembeli kami yang siapkan.
                </div>
                <div
                    class=" px-[30px] py-[12px] mb-[20px] bg-blues bg-opacity-10 lg:w-[177px] rounded-[8px] text-blues text-xs hover:bg-opacity-30">
                    <a href="#">DAFTAR DAN TUMBUH BERSAMA</a>
                </div>
                <div class="button flex flex-col  lg:flex-row md:flex-row gap-[18px] md:pb-2">
                    <div
                        class="button-invite px-[42px] py-[24px] border-[1px] border-blues rounded-[14px] text-blues hover:bg-blues hover:text-white">
                        About More
                    </div>
                    <div
                        class="button-invite lg:mb-0  md:mb-0 mb-3 px-[42px] py-[24px] border-[1px] border-blues rounded-[14px] text-blues hover:bg-blues hover:text-white">
                        Invite Friend
                    </div>
                </div>
            </div>
            <div class="right mt-[72px] mb-[82px]">
                <img src="images/home.png" alt="" />
            </div>
        </div>
    </section>

    <livewire:footer />

    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>


    @livewireScripts
</body>

</html>
