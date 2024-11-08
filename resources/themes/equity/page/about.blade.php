<x-equity::layout.main-layout :navitems="$navitems" title="{{$title}}">
    <div class="uk-section uk-padding-remove-vertical in-equity-breadcrumb">
        <div class="uk-container">
            <div class="uk-grid">
                <div class="uk-width-1-1">
                    <ul class="uk-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li><span>About</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-match uk-child-width-1-2@s uk-child-width-1-3@m in-card-10 uk-grid uk-grid-stack" data-uk-grid="">
                <div class="uk-width-1-1 uk-first-column">
                    <section id="about">
                        <div class="container">
                            <h2>About Us</h2>
                            <p>Welcome to <strong>{{$appName}}</strong>, your trusted partner for investment and trading solutions. Our platform is dedicated to providing individuals and institutions with seamless access to the world of stocks and forex trading. Whether you’re an experienced trader or just starting your investment journey, we offer the tools, resources, and support needed to navigate the complex financial markets confidently.</p>

                            <h3>Our Mission</h3>
                            <p>At <strong>{{$appName}}</strong>, our mission is to empower traders and investors by equipping them with cutting-edge technology, insightful market analysis, and a user-friendly experience. We believe that everyone should have the opportunity to grow their wealth and achieve financial independence through intelligent investment decisions.</p>

                            <h3>Why Choose Us?</h3>
                            <ul>
                                <li><strong>Comprehensive Trading Options:</strong> Access a wide range of investment opportunities, including stocks and forex, all on one platform.</li>
                                <li><strong>Advanced Tools:</strong> Utilize professional-grade trading tools and analytics designed to enhance your decision-making process.</li>
                                <li><strong>Secure Platform:</strong> Trade with confidence knowing that your data and investments are protected by industry-leading security measures.</li>
                                <li><strong>Dedicated Support:</strong> Our experienced support team is available to assist you with any questions or guidance you may need on your trading journey.</li>
                            </ul>

                            <h3>Join Our Community</h3>
                            <p>Become part of a vibrant community of traders and investors who are passionate about achieving financial success. With <strong>{{$appName}}</strong>, you’re not just trading — you’re investing in your future.</p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-equity::layout.main-layout>
