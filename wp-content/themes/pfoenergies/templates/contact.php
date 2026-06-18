<?php
/*
Template Name: Contact
*/

get_header();
?>

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

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-14 space-y-10 font-extralight">

        <!-- Onglets -->
        <div class="flex flex-wrap gap-8 md:gap-16 text-xl">
            <button
                class="flex items-center gap-2 pb-2 border-b-2 border-primary text-primary">
                <svg xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 64 64" 
                        stroke="currentColor" 
                        fill="currentColor" 
                        class="w-6 h-6 transition-colors duration-300"> 
                    <rect x="6" y="2" width="32" height="60" rx="6" fill="none" stroke-width="2" stroke-linejoin="round" />
                    
                    <line x1="6" y1="10" x2="38" y2="10" stroke-width="1" />
                    <line x1="6" y1="52" x2="38" y2="52" stroke-width="1" />
                    
                    <line x1="19" y1="6" x2="25" y2="6" stroke-width="1" stroke-linecap="round" />
                    <line x1="20" y1="56" x2="24" y2="56" stroke-width="1" stroke-linecap="round" />
                    
                    <path d="M 30 14 H 56 A 4 4 0 0 1 60 18 V 34 A 4 4 0 0 1 56 38 H 42 L 34 46 V 38 H 30 A 4 4 0 0 1 26 34 V 18 A 4 4 0 0 1 30 14 Z" 
                            fill="white" stroke-width="2" stroke-linejoin="round" />
                    
                    <circle cx="32" cy="22" r="1.5" />
                    <line x1="38" y1="22" x2="52" y2="22" stroke-width="1" stroke-linecap="round" />
                    
                    <circle cx="32" cy="30" r="1.5" />
                    <line x1="38" y1="30" x2="48" y2="30" stroke-width="1" stroke-linecap="round" />
                </svg>
                Contactez-nous
            </button>

            <button
                class="flex items-center gap-2 pb-2 text-primary/70 hover:text-primary transition">
                <svg xmlns="http://www.w3.org/2000/svg" 
                        viewBox="0 0 24 24" 
                        fill="none" 
                        stroke="currentColor" 
                        stroke-width="1" 
                        stroke-linecap="round" 
                        stroke-linejoin="round" 
                        class="w-6 h-6">
                    <path d="M4 18a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H9" />
                    <path d="M19 3h2a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-2" />
                    <path d="M3 16h11a2 2 0 0 1 2 2v0a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                    <line x1="8" y1="7" x2="13" y2="7" />
                    <line x1="8" y1="10" x2="16" y2="10" />
                    <line x1="8" y1="13" x2="16" y2="13" />
                </svg>
                Demandez un devis
            </button>
        </div>

        <!-- Contenu -->
        <div class="max-w-6xl mx-auto grid lg:grid-cols-12 gap-10 lg:gap-24">
            <!-- Colonne gauche -->
            <aside class="lg:col-span-4 lg:pr-10 lg:border-r border-gray-300">
                <h3 class="uppercase text-base mb-8">
                    Nos coordonnées
                </h3>

                <div class="space-y-8 text-primary">
                    <!-- Adresse -->
                    <div class="flex items-start gap-4">
                        <div
                            class="size-8 rounded-full bg-primary flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    class="w-6 h-6">
                                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                                <circle cx="12" cy="9" r="3" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-base">Adresse</h4>

                            <p class="text-primary text-sm">
                                Immeuble Carbone, Cocody
                                <br>
                                16 BP 387 Abidjan 16
                            </p>
                        </div>
                    </div>
                    <!-- Téléphone -->
                    <div class="flex items-start gap-4">
                        <div
                            class="size-8 rounded-full bg-primary flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    class="w-5 h-5">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 .81.7A2 2 0 0 1 22 16.92z" />
                                <path d="M14 6.5a5 5 0 0 1 3.5 3.5" />
                                <path d="M17.5 3.5a8 8 0 0 1 5.5 5.5" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-base">
                                Téléphone
                            </h4>

                            <p class="text-primary text-sm">
                                (+225) 27 22 20 78 16
                            </p>
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="flex items-start gap-4">
                        <div
                            class="size-8 rounded-full bg-primary flex items-center justify-center text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" 
                                    viewBox="0 0 24 24" 
                                    fill="none" 
                                    stroke="currentColor" 
                                    stroke-width="2" 
                                    stroke-linecap="round" 
                                    stroke-linejoin="round" 
                                    class="w-5 h-5">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-base">
                                Email général
                            </h4>

                            <p class="text-primary text-sm">
                                contact@pfoenergies.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <h3 class="uppercase text-base mb-5">
                        Contact spécialisé
                    </h3>

                    <div>
                        <h4 class="text-base font-semibold">
                            Recrutement
                        </h4>
                        <a href="mailto:recrutement@pfoenergies.com"
                            class="text-primary text-sm hover:underline">
                            recrutement@pfoenergies.com
                        </a>
                    </div>
                </div>
            </aside>

            <!-- Colonne droite -->
            <div class="lg:col-span-8">
                <h2 class="text-xl text-primary font-light">
                    Envoyez-nous un message
                </h2>

                <p class="text-gray-600 text-base mt-2 mb-8">
                    Notre équipe vous répondra dans les plus brefs délais.
                </p>

                <form class="space-y-8">
                    <!-- Ligne 1 -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-primary mb-2">
                                Prénom *
                            </label>
                            <input
                                type="text"
                                placeholder="Votre prénom"
                                class="w-full border border-primary px-4 py-3 outline-none">
                        </div>
                        <div>
                            <label class="block text-primary mb-2">
                                Nom *
                            </label>
                            <input
                                type="text"
                                placeholder="Votre nom"
                                class="w-full border border-primary px-4 py-3 outline-none">
                        </div>
                    </div>

                    <!-- Ligne 2 -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-primary mb-2">
                                Email *
                            </label>
                            <input
                                type="email"
                                placeholder="Votre@email.com"
                                class="w-full border border-primary px-4 py-3 outline-none">
                        </div>
                        <div>
                            <label class="block text-primary mb-2">
                                Téléphone *
                            </label>
                            <input
                                type="text"
                                placeholder="+225 xx xx xx xx xx"
                                class="w-full border border-primary px-4 py-3 outline-none">
                        </div>
                    </div>

                    <!-- Ligne 3 -->
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-primary mb-2">
                                Société
                            </label>
                            <input
                                type="text"
                                placeholder="Votre société"
                                class="w-full border border-primary px-4 py-3 outline-none">
                        </div>
                        <div>
                            <label class="block text-primary mb-2">
                                Objet *
                            </label>
                            <select
                                class="w-full h-full border border-primary px-4 py-3 outline-none">

                                <option>Sélectionner</option>
                                <option>Demande d'information</option>
                                <option>Demande de devis</option>
                                <option>Partenariat</option>

                            </select>
                        </div>
                    </div>

                    <!-- Message -->
                    <div>
                        <label class="block text-primary mb-2">
                            Message
                        </label>
                        <textarea
                            rows="6"
                            placeholder="Détaillez votre message"
                            class="w-full border border-primary px-4 py-3 outline-none resize-none"></textarea>
                    </div>

                    <!-- Consentement -->
                    <label class="flex items-center gap-3 text-sm text-gray-600">
                        <input
                            type="checkbox"
                            class="">
                        <span>
                            J'accepte que mes données soient traitées conformément à la
                            <a href="#" class="text-primary font-medium">
                                politique de confidentialité
                            </a>
                        </span>

                    </label>

                    <!-- Bouton -->
                    <button
                        type="submit"
                        class="inline-flex items-center gap-3 bg-primary text-white px-6 py-3 hover:bg-white hover:text-primary border-2 border-primary transition">

                        Envoyer

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"/>

                        </svg>

                    </button>

                </form>

            </div>

        </div>

    </div>

<?php 
endwhile; // Fin de la boucle
get_footer(); 
?>