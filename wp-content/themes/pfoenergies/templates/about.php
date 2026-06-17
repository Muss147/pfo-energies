<?php
/*
Template Name: À propos
*/
?>

<?php get_header(); ?>

<?php 
// Lancement de la boucle WordPress globale
while (have_posts()) : the_post(); 
?>

    <?php 
    // On réutilise notre logique de fallback pour l'image à la une
    $banner_url = has_post_thumbnail() 
        ? get_the_post_thumbnail_url(get_the_ID(), 'full') 
        : 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mO8dOlyPQAH7QL4Bgm9FAAAAABJRU5ErkJggg=='; // Ton image par défaut
    ?>
    
    <div class="w-full h-168.75 bg-cover bg-center bg-no-repeat bg-fixed" style="background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('<?= esc_url($banner_url); ?>');">
        <div class="max-w-350 mx-auto px-4 md:px-6 h-full py-14 mt-5 md:mt-19">
            <div class="max-w-full lg:max-w-2/5 w-full text-white">
                <h1 class="text-2xl md:text-4xl uppercase font-semibold">
                    <?php the_title(); ?>
                </h1>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-14 space-y-16">
        
        <div class="flex flex-col md:flex-row gap-6 items-center justify-between">
            <a href="<?= home_url('/'); ?>" class="logo" title="<?= __('Homepage', 'pfoenergies') ?>">
                <img alt="<?= __('Homepage', 'pfoenergies') ?>" src="<?= get_theme_mod('logo') ?>" class="h-8 md:h-11">
            </a>
            <div class="flex flex-col md:flex-row justify-center md:justify-end text-primary text-base gap-4 md:gap-0">
                <div class="text-center md:text-left px-6 md:border-r-2 md:border-primary">
                    <h4 class="font-bold">Date de création</h4>
                    <span class="font-extralight text-sm">2022</span>
                </div>
                <div class="text-center md:text-left px-6 md:border-r-2 md:border-primary">
                    <h4 class="font-bold">Localisation</h4>
                    <span class="font-extralight text-sm">Immeuble Carbone, Cocody</span>
                </div>
                <div class="text-center md:text-left px-6">
                    <h4 class="font-bold">Équipe spécialisée</h4>
                    <span class="font-extralight text-sm">+40 Collaborateurs</span>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Présentation</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col gap-6 font-light text-gray-800">
                    <p>Créée fin 2022, PFO Énergies développe, finance et exploite des infrastructures durables pour favoriser l’accès à l’électricité verte en Afrique de l’Ouest.
                    Filiale du groupe PFO AFRICA, la centrale est spécialisée dans le développement et la mise en place opérationnelle de solutions de production d’énergie
                    renouvelable et d’ingénierie énergétique.</p>
                    <p>PFO Énergies oeuvre pour un accès pour tous à une énergie bas carbone à travers des solutions optimisées, connectées au réseau national ou en
                    autoconsommation.</p>
                </div>
            </div>
        </div>

        <div class="space-y-8 relative">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Mission & <br class="hidden md:block"> vision de la filiale</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto grid lg:grid-cols-2 items-center justify-between gap-4 md:gap-8">
                <div class="flex-none w-full h-96 bg-cover bg-center bg-no-repeat shadow-xl/20" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/bg/business_hands_joined_together_teamwork-sYpj0sjs.jpg');"> </div>
                <div class="flex flex-col items-center gap-6 font-light text-gray-800">
                    <p>PFO Énergies se spécialise dans le développement de solutions de productions
                    d’énergies renouvelables et d’optimisation des réseaux de distribution.
                    PFO Energies se dédie à la promotion des énergies vertes (Solaire, Biomasse,
                    Hydraulique) en IPP ou BtoB.</p>
                    <p>PFO Énergies ambitionne de devenir un acteur majeur de la transition énergétique
                    en Côte d’Ivoire et la sous-région en détenant plus de 700 MWc de puissance
                    installée.</p>
                </div>
            </div>
            <div class="absolute bottom-0 right-0 flex-none size-10 border-r border-b border-primary"></div>
        </div>

        <div class="space-y-6">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Historique / Parcours</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto">
                <div class="flex flex-col gap-6 font-light text-gray-800 mb-8">
                    <p>PFO Énergies est la filiale énergies du groupe PFO Africa.</p>
                    <p>Doté d’un actionnariat 100% ivoirien, nous bénéficions d’un ancrage local et régional nous permettant de maîtriser l’ensemble de la chaîne de valeur du
                    développement d’un projet de développement énergie.</p>
                    <p>Nous travaillons en étroite collaboration avec notre réseau d’experts locaux et de leaders internationaux pour développer des actifs innovants et de qualité.</p>
                    <p>Avec le lancement des travaux de notre première centrale solaire (Ferké Solar) en septembre 2024, nous ambitionnons à devenir un acteur majeur de la transition
                    énergétique en Côte d’Ivoire et la sous-région.</p>
                </div>

                <div class="max-w-3xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 text-primary border border-primary">
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10 bg-primary text-white">
                        <p>Présent dans 4 pays : Côte d’Ivoire - Burkina Faso - Mali - Togo</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10">
                        <p>Maîtrise du cycle de développement d’un projet énergétique</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10 bg-primary text-white sm:bg-transparent sm:text-primary md:bg-primary md:text-white">
                        <p>Une approche long- terme</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10 bg-white text-primary sm:bg-primary sm:text-white md:bg-transparent md:text-primary">
                        <p>Maîtrise des aspects juridiques et fiscaux de nos pays d’intervention</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10 bg-primary text-white">
                        <p>Un réseau d’experts locaux et internationaux</p>
                    </div>
                    <div class="flex items-center justify-center sm:text-lg lg:text-xl p-10">
                        <p>Capacité d’investissement et d’exécution</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-12">
            <div class="inline-block">
                <h2 class="text-xl text-primary uppercase leading-none tracking-tight font-semibold">Nos engagements</h2>
                <div class="mt-1 h-0.5 w-16 bg-primary"></div>
            </div>
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center justify-between gap-6 md:gap-12">
                <div class="flex-none w-full h-72 bg-cover bg-center bg-no-repeat shadow-xl/20" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/projets/politique-genre.png');"> </div>
                <div class="flex flex-col gap-6 text-base font-light text-gray-800">
                    <div class="inline-block">
                        <h2 class="text-lg text-primary uppercase leading-none tracking-tight font-semibold">Politique genre</h2>
                        <div class="mt-1 h-0.5 w-16 bg-primary"></div>
                    </div>
                    <p>La politique genre du groupe PFO Énergies, vise à promouvoir une
                    organisation inclusive, équitable et durable. Il met en avant l’importance de
                    l’égalité des sexes comme levier de performance, d’innovation et d’impact
                    social positif.</p>
                    <p>L’entreprise s’engage à offrir aux femmes et aux hommes les mêmes
                    opportunités d’accès à l’emploi, à la formation et à l’évolution
                    professionnelle, tout en intégrant cette démarche dans ses activités
                    internes, ses relations avec les partenaires et ses interventions auprès des
                    communautés.</p>
                </div>
            </div>
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center justify-between gap-6 md:gap-12">
                <div class="flex flex-col gap-6 text-base font-light text-gray-800 order-2 md:order-1">
                    <div class="inline-block">
                        <h2 class="text-lg text-primary uppercase leading-none tracking-tight font-semibold">Politique contenu local</h2>
                        <div class="mt-1 h-0.5 w-16 bg-primary"></div>
                    </div>
                    <p>PFO Énergies s’engage à recruter et à former des travailleurs locaux, en
                    priorisant les compétences locales, afin de contribuer à la création
                    d’emplois dans les communautés où nous opérons. Nous soutiendrons
                    activement la croissance et la compétitivité des entreprises ivoiriennes en
                    facilitant leur participation dans notre chaîne d’approvisionnement.</p>
                    <p>PFO Énergies et le Groupe PFO dans sa globalité investissent dans des
                    initiatives de responsabilité sociale des entreprises (RSE) qui profitent
                    directement aux communautés locales et au développement social. Le
                    Groupe PFO développe et soutient des programmes de formation pour
                    améliorer les compétences des travailleurs ivoiriens et les préparer aux
                    emplois dans notre secteur.</p>
                </div>
                <div class="flex-none w-full h-72 bg-cover bg-center bg-no-repeat shadow-xl/20 order-1 md:order-2" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/projets/odienne-solar.png');"> </div>
            </div>
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 items-center justify-between gap-6 md:gap-12">
                <div class="flex-none w-full h-72 bg-cover bg-center bg-no-repeat shadow-xl/20" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/projets/politique-environnementale.png');"> </div>
                <div class="flex flex-col gap-6 text-base font-light text-gray-800">
                    <div class="inline-block">
                        <h2 class="text-lg text-primary uppercase leading-none tracking-tight font-semibold">Politique <br class="hidden md:block"> environnementale <br class="hidden md:block"> et sociale</h2>
                        <div class="mt-1 h-0.5 w-16 bg-primary"></div>
                    </div>
                    <p>PFO Énergies s’engage à promouvoir des pratiques durables dans ses
                    projets et à éviter ou atténuer les impacts E & S négatifs, dans le cadre de
                    la mise en oeuvre de son système de gestion environnemental et social.</p>
                    <p>Nous nous engageons à respecter les lois nationales et internationales
                    relatives à la responsabilité sociale et environnementale.</p>
                </div>
            </div>
        </div>
    </div>

<?php 
endwhile; // Fin de la boucle
get_footer(); 
?>