@extends('layouts.web')
@section('main')
    <section class="bg-brightOrange text-dark-navy">
        <div class="container py-10 mx-auto sm:px-4">
            <!-- Strip 1: Engaging Headline -->
            <div class="mb-10 text-center">
                <h1 class="text-2xl font-bold sm:text-4xl font-montserrat">
                    Our Journey: Fueled by Passion, Driven by Purpose, Focused on Progress
                </h1>
            </div>

            <!-- Strip 2: About Us Paragraph -->
            <div class="mb-10">
                <p class="text-lg">
                    SHRI JAGDISH CHANDER GOYAL (J.C. Goyal), our founder and Chairman, began his publishing journey in the
                    early 1960s, dedicating over SIX DECADES to building a legacy of excellence and innovation. His vision
                    and leadership have shaped JAY CEE PUBLICATIONS into one of India’s leading educational publishers.
                    Since 1984, we have proudly delivered high-quality school textbooks, driven by a commitment to
                    performance and progress in today’s competitive landscape.
                    <br>
                    <br>
                    J.C. Goyal laid the foundation for our success, and in 1984, CO-FOUNDER RAJIV GOYAL joined the company,
                    bringing fresh insights and ensuring we remained at the forefront of educational innovation. Continuing
                    the family legacy, ADITYA GOYAL joined the team in 2021, introducing digital advancements and new ideas
                    to bridge tradition with modernity. Together, they are guiding the future of education, dedicated to
                    inspiring the next generation of learners.
                    <br>
                    <br>
                    Today, JAY CEE serves over 5,000 schools and booksellers across India, reflecting our unwavering
                    commitment to education. We are honored to partner with esteemed institutions such as St. Stephen Group
                    Kolkata, MBOSE, Bijnore Diocese, Varanasi Diocese, St. Anthony Group in Andhra Pradesh, St. Ann’s Group
                    in Andhra Pradesh, and many others. We proudly support diverse communities in their educational efforts.
                    <br>
                    <br>
                    We are also privileged to collaborate with distinguished educationists such as N.K. Aggarwala, Fr. G A
                    Hess SJ (XLRI), Dr. C.J. Joseph (who introduced Moral Science in Indian education), P. George (Council
                    for ICSE), Sr. Mary Pratetei SND, Dr. Balram Pani (Famous Author and Principal at Delhi University),
                    Sujata Shrivastava (California, U.S.A.), Felcylo Fernando, S Krishnan M.A., PGDCA, Lucia Albuquerque,
                    Petra Jurkovic, Mrs. Ruth Harring Ph.D. (U.S.A.), Rev. Sister Maurice SJC, Fr. F Xavier SDB, Fr. Mathai
                    Vellappallil SDB, Ms. Chander Kanta Jain (President Awardee), Ms. Kamlesh Jagnya, Fr. GP Amaralj, Fr.
                    Johnney Pulloppillil, Fr. Jose G. Chakkalakkal TOR, Fr. Marianus Karketta SJ, K.A. Mathew, Fr. Manoj
                    Vengathanam TOR, Ms. Kamlesh Kumari, Chandra Kanta Jain, Mrs. Gurpreet Kaur, Seema Aggarwal, Biju Mavra,
                    Ajit Kumar Rawal, and many others. Their guidance and contributions enrich our continuous innovation and
                    commitment to maintaining the highest educational standards.
                    <br>
                    <br>
                    Our Health & Physical Education books, authored by Brigadier F.B. Khattri and Col. J.M. Rosemeyer, VSM,
                    reflect the expertise of these highly regarded professionals, ensuring the quality of these important
                    resources.
                    <br>
                    <br>
                    At JAY CEE, a dedicated team of writers, editors, and digital content developers work tirelessly to
                    ensure our books align with the latest NCERT, CBSE, ICSE, or respective state board guidelines. Our
                    commitment to quality and relevance keeps our publications impactful for students across India.
                    <br>
                    <br>
                    We don’t just publish books; we ignite a passion for learning and pave the way for a brighter future.
                    Join us on this exciting journey, where every page we turn brings us closer to knowledge, growth, and
                    boundless possibilities.
                </p>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-10 mx-auto sm:px-4">
            <!-- Strip 3: Mission and Vision -->
            <div class="mb-10 text-center">
                <h2 class="pb-10 text-4xl font-bold text-dark-navy dark:text-white font-montserrat">Mission and Vision</h2>
                <div class="flex flex-col justify-around gap-5 mt-10 sm:flex-row">
                    <div
                        class="w-full p-6 transition-all duration-300 transform rounded-lg shadow cursor-pointer bg-brightOrange sm:w-2/5 hover:shadow-md text-dark-navy">
                        <h1 class="pt-5 text-3xl font-semibold">Mission</h1>
                        <p class="p-5 text-lg ">
                            Our mission is to empower minds and inspire creativity through the written word. We are
                            dedicated to
                            providing
                            high-quality, innovative, and engaging publications that enrich lives, ignite curiosity, and
                            nurture
                            knowledge
                            across diverse audiences. With a commitment to excellence, we strive to be a trusted platform
                            for
                            authors,
                            educators, and readers, promoting lifelong learning and cultural growth.
                        </p>
                    </div>
                    <div
                        class="w-full p-6 transition-all duration-300 transform rounded-lg shadow cursor-pointer bg-brightOrange sm:w-2/5 hover:shadow-md text-dark-navy">
                        <h1 class="pt-5 text-3xl font-semibold">Vision</h1>
                        <p class="p-5 text-lg">
                            Our vision is to become a global leader in publishing, shaping the future of education,
                            literature, and storytelling. We aim to create a world where every idea has the power to
                            influence, every voice is heard, and knowledge flows freely. By championing diverse perspectives
                            and fostering innovation, we aspire to be at the forefront of positive change in the literary
                            and educational communities.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-200 dark:bg-gray-900">
        <div class="container py-10 mx-auto sm:px-4">
            <!-- Strip 4: Core Values -->
            @php
            @endphp
            <div class="mb-10 text-center">
                <h2 class="pb-10 text-4xl font-bold text-dark-navy dark:text-white font-montserrat">Core Values</h2>
                <div class="flex flex-col flex-wrap justify-center gap-5 my-5 sm:flex-row">
                    @foreach ($coreValues as $value => $description)
                        <div
                            class="w-full p-6 transition-all duration-300 transform rounded-lg shadow cursor-pointer text-dark-navy bg-brightOrange sm:w-1/5 hover:scale-105 hover:shadow-md">
                            <h3 class="py-5 text-xl font-bold">{{ $value }}</h3>
                            <p>{{ $description }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('web.partials.authors')

    <section>
        <div class="container py-10 mx-auto sm:px-4">
            <!-- Strip 7: Call-to-Action -->
            <div class="text-center">
                <h2 class="mb-5 text-4xl font-bold text-dark-navy dark:text-white font-montserrat">Join Our Journey</h2>
                <p class="mb-4 text-lg text-gray-600 dark:text-gray-50">
                    Want to know more? Let’s stay connected! Explore, engage, and become part of our story.
                </p>
                <div class="my-10">
                    <a href="{{ route('web.contact') }}"
                        class="px-5 py-3 font-bold transition-colors duration-300 ease-in-out rounded-md hover:text-white text-dark-navy bg-brightOrange hover:bg-navy">
                        Get in Touch
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
