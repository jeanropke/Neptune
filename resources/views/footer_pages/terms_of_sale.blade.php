@extends('layouts.master', ['menuId' => '0'])

@section('title', 'Terms And Conditions of Sale')

@section('content')
    <table border="0" cellpadding="0" cellspacing="0" width="100%" class="content-section-2col">
        <tbody>
            <tr>
                <td rowspan="2" style="width: 8px;"></td>
                <td valign="top" style="width: 740px;">
                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td valign="top" style="width: 215px; height: 400px;" class="habboPage-col">
                                    @foreach (boxes('footer_pages.terms_of_sale', 1) as $box)
                                        <div class="portlet-scale gold">
                                            <div class="portlet-scale-header">
                                                <h3>{{ $box->title }}</h3>
                                            </div>
                                            <div class="portlet-scale-body">
                                                <div class="portlet-scale-content">
                                                    {!! $box->content !!}
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                            <div class="portlet-scale-bottom">
                                                <div class="portlet-scale-bottom-body"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                                <td valign="top" style="width: 539px;" class="habboPage-col rightmost">

                                    <div class="v3box yellow">
                                        <div class="v3box-top">
                                            <h3>Terms And Conditions of Sale</h3>
                                        </div>
                                        <div class="v3box-content">
                                            <div class="v3box-body">

                                                <div align="center"><span style="font-weight: bold;">TERMS AND CONDITIONS OF SALE</span></div>
                                                <br><br>
                                                THESE TERMS AND CONDITIONS OF SALE GOVERN YOUR PURCHASES OF PRODUCTS AND SERVICES FROM SULAKE, INC. (“COMPANY”). EVERY TIME YOU MAKE A
                                                PURCHASE THROUGH COMPANY, OR ITS VENDORS, WITH RESPECT TO OUR SITE, YOU ACKNOWLEDGE AND ACCEPT THESE TERMS AND CONDITIONS OF SALE. Every
                                                order you place through Company or its vendors will be deemed your offer to purchase. We may accept your offer either through
                                                confirmation or through delivery. Our acceptance of each offer as specified is expressly subject to and conditioned on your acceptance
                                                of these (and only these) Terms and Conditions of Sale and our Terms of Use.
                                                <br><br><span style="font-weight: bold;">
                                                    COINS, VIRTUAL ITEMS AND SUBSCRIPTION FEES
                                                </span><br><br>
                                                Purchases of Habbo Coins and of Premium Subscriptions are purchases of a limited, non-transferable, revocable license. Such license
                                                expires after one (1) year from purchase for Coins so use them promptly. The license term for the Premium Subscription is the term of
                                                such applicable subscription period.
                                                <br><br>
                                                Coins have no monetary value, are non-refundable and cannot be used to purchase or use products or services other than in-game play
                                                offered by Sulake (e.g., Habbo® Furni or Habbo® Games). Although you may buy Coins via mobile services, the Coins are not redeemable for
                                                content or services offered by the carrier. Similarly a Premium Subscription is non-refundable, has no monetary value and is limited by
                                                the terms of the subscription. <span style="font-weight: bold;">BOTH COINS AND PREMIUM SUBSCRIPTIONS ARE SUBJECT TO EXPIRATION AND
                                                    REVOCATION AS SET FORTH IN THE <a
                                                        href="https://web.archive.org/web/20071012044431/http://www.habbo.com/footer_pages/terms_and_conditions.html">TERMS OF
                                                        USE</a></span>.
                                                <br><br>
                                                You have no property interest in Coins, any subscription, your avatar, or virtual items (e.g., Furni or Rares), which remain the
                                                exclusive property of Sulake subject only to your limited, non-transferable revocable license to use such for in-game play subject to
                                                the <a href="https://web.archive.org/web/20071012044431/http://www.habbo.com/footer_pages/terms_and_conditions.html">Terms of Use</a>.
                                                Any attempt to sell or transfer same will result in an automatic termination of such license. Further, as these are merely licensed game
                                                play activities, they are deemed consumed upon purchase like putting a quarter in an arcade game.
                                                <br><br style="font-weight: bold;"><span style="font-weight: bold;">
                                                    MONEY MATTERS</span>
                                                <br><br>
                                                All prices we show on this site are subject to change without notice. Prices stated at beginning of delivery apply. Applicable shipping
                                                and handling charges, which do not apply to Habbo® Coins or virtual products such as digital furniture (“Furni”) (if any), are not
                                                included in the product prices, but all such charges will be added to your invoice and will be visible at check out before you complete
                                                your purchase.
                                                <br><br>
                                                We will collect sales tax in the states we are required by law to do so. Thus we may require you to tell us your state of residency when
                                                ordering. Applicable sales tax will be added to your purchase.
                                                <br><br>
                                                All Coins, Premium Subscriptions and all virtual products (including “Furni” and all other items or services within the Hotel) are
                                                non-refundable, except, in our sole and absolute discretion and are subject to revocation and the <a
                                                    href="https://web.archive.org/web/20071012044431/http://www.habbo.com/footer_pages/terms_and_conditions.html">Terms of Use</a>.
                                                Virtual products purchased will be available for use as soon as reasonably practicable.
                                                <br><br><span style="font-weight: bold;">
                                                    CREDIT CARD SECURITY
                                                </span><br><br>
                                                Shopping should be fun, and we want you to feel safe and secure when you shop with us at Habbo Hotel. Please see our <a
                                                    href="https://web.archive.org/web/20071012044431/http://www.habbo.com/footer_pages/privacy_policy.html">Privacy Policy</a> to
                                                understand how we take care of your personal information. Of course, as you’re shopping with us online, you may give us your credit card
                                                information, and we take the responsibility of caring for that information very seriously. While no security system is absolute, we
                                                employ industry standard security systems. Our servers protect your information using encryption and firewall technology throughout the
                                                ordering process. Most browsers will show a lock icon in the bottom status bar on secure pages. Look for this icon on any web page that
                                                asks for your personal information. We also use state-of-the-art Secure Sockets Layer (SSL) encryption to protect your personal
                                                information from unauthorized use.
                                                <br><br><span style="font-weight: bold;">
                                                    FAIR CREDIT BILLING ACT
                                                </span><br><br>
                                                Thanks to the Fair Credit Billing Act, your credit card company or your bank cannot hold you responsible for an amount higher than $50
                                                of unauthorized or otherwise fraudulent charges made to your credit card. Liability on a debit card can be greater, but check with your
                                                bank because most of them grant the same $50 limit to debit cards.
                                                <br><br><span style="font-weight: bold;">
                                                    RETURN, EXPIRATION, REVOCATION AND DORMANCY POLICY
                                                </span><br><br>
                                                We will accept your return of physical products (not virtual products, Coins or subscriptions) purchased through the site as long as the
                                                products and packaging are returned in their original condition within 30 days of shipment to you. When we ship you the products, we’ll
                                                include a return authorization form that you need to enclose along with anything you send back to us.
                                                <br><br>
                                                All Habbo Coins, subscription services and virtual products (including “Furni” and all other game play activities items or services
                                                within the Hotel) are non-refundable, and non-returnable except, in our sole and absolute discretion and are subject to revocation and
                                                the <a href="https://web.archive.org/web/20071012044431/http://www.habbo.com/footer_pages/terms_and_conditions.html">Terms of Use</a>.
                                                You understand that Coins will expire after one year, so use them while you can. Subscriptions expire according to their term. Further,
                                                in Sulake’s sole discretion, Habbo accounts that are either unused or have been used only once for a period greater than six (6) months
                                                may be terminated. If we cannot fill your order in 30 days, we will give you notice and an opportunity to cancel and obtain a refund.
                                                <br><br><span style="font-weight: bold;">
                                                    OTHER STUFF
                                                </span><br><br>
                                                We reserve the right to furnish materially equivalent substitutions for materials which cannot be obtained in sufficient quantities, or
                                                to cancel the excess portion of the order. We shall not be in default if delivery is delayed or rendered impossible by forces of nature,
                                                war, civil commotion, governmental action, terrorism, fire, storm, flood, explosion, strikes, walkouts, other industrial disturbances,
                                                utility, services, network or transportation interruptions, server crashes, hackers, viruses, technical glitches or any other cause
                                                beyond our reasonable control. We may revise or modify products, product information or pricing without notice. We are not responsible
                                                for typos, fax or printing errors. Sulake, Inc. is an independent contractor.
                                                <br><br>
                                                These Terms and Conditions of Sale will be governed and interpreted pursuant to the laws of the State of California, United States of
                                                America, for contracts to be executed and fully performed therein and notwithstanding any principles of conflicts of law. The parties
                                                specifically disclaim application of the Convention on Contracts for the International Sale of Goods. You specifically consent to
                                                personal jurisdiction in the State of California in connection with any dispute between you and Company arising out of these Terms and
                                                Conditions of Sale or pertaining to the subject matter hereof. <span style="font-weight: bold;">YOU IRREVOCABLY WAIVE ALL RIGHTS TO
                                                    BRING OR PARTICIPATE IN ANY CLASS ACTION SUITS OR CLAIMS REGARDING THE MATTERS RELATED HERETO AND CONSENT TO THE MANDATORY
                                                    ARBITRATION PROVISIONS IN THE</span><a
                                                    href="https://web.archive.org/web/20071012044431/http://www.habbo.com/footer_pages/terms_and_conditions.html"
                                                    style="font-weight: bold;"> TERMS OF USE</a><span style="font-weight: bold;">.</span> If any part of these Terms and Conditions of
                                                Sale is unlawful, void or unenforceable, that part will be deemed severable and will not affect the validity and enforceability of any
                                                remaining provisions. These Terms and Conditions of Sale constitute the entire agreement among the parties relating to this subject
                                                matter. To the extent a purchase order, confirmation letter, or other communication is inconsistent with these Terms and Conditions of
                                                Sale, these Terms and Conditions of Sale will govern, unless expressly agreed in writing otherwise by an executive officer of Company
                                                (i.e., regular employees cannot bind the Company).
                                                <br><br><span style="font-weight: bold;">Last updated:</span> August 15, 2007.

                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="v3box-bottom">
                                            <div></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>

                <td rowspan="2" style="width: 4px;"></td>

                <td rowspan="2" valign="top" style="width: 176px;">
                    <div id="ad_sidebar">
                        @include('includes.partners')
                        @include('includes.ad160')
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@stop
