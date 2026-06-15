<?php

namespace Database\Seeders;

use App\Models\Chapitre;
use App\Models\Lecon;
use App\Models\Parcours;
use Illuminate\Database\Seeder;

class QuotidienSeeder extends Seeder
{
    // Vocabulary sorted alphabetically within each category
    protected static array $chapitres = [
        [
            'slug' => 'base-quotidienne',
            'titre' => 'Base Quotidienne',
            'sur_titre' => 'NIVEAU ZÉRO',
            'description' => 'Vocabulaire essentiel du quotidien classé par thème.',
            'template_vue' => 'quotidien',
            'couleur_theme' => '#581c87',
            'ordre' => 5,
            'lecons' => [
                // Animaux — sorted A-Z
                ['de' => 'Fisch', 'article' => 'der', 'fr' => 'le poisson', 'categorie' => 'Animaux', 'img' => 'https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400&q=80'],
                ['de' => 'Hund', 'article' => 'der', 'fr' => 'le chien', 'categorie' => 'Animaux', 'img' => 'https://images.unsplash.com/photo-1587300003388-59208cc962cb?w=400&q=80'],
                ['de' => 'Katze', 'article' => 'die', 'fr' => 'le chat', 'categorie' => 'Animaux', 'img' => 'https://images.unsplash.com/photo-1536599018102-9f803c140fc1?w=400&q=80'],
                ['de' => 'Pferd', 'article' => 'das', 'fr' => 'le cheval', 'categorie' => 'Animaux', 'img' => 'https://images.unsplash.com/photo-1553284965-83fd3e82fa5a?w=400&q=80'],
                ['de' => 'Schlange', 'article' => 'die', 'fr' => 'le serpent', 'categorie' => 'Animaux', 'img' => 'https://images.unsplash.com/photo-1518531933037-91b2f5f9cc0f?w=400&q=80'],
                ['de' => 'Schwein', 'article' => 'das', 'fr' => 'le cochon', 'categorie' => 'Animaux', 'img' => 'https://images.unsplash.com/photo-1516387938669-e51de1d152e9?w=400&q=80'],
                ['de' => 'Vogel', 'article' => 'die', 'fr' => "l'oiseau", 'categorie' => 'Animaux', 'img' => 'https://images.unsplash.com/photo-1444464666175-1642a4d30d16?w=400&q=80'],
                // Habitat — sorted A-Z
                ['de' => 'Bett', 'article' => 'das', 'fr' => 'le lit', 'categorie' => 'Habitat', 'img' => 'https://images.unsplash.com/photo-1540932239986-310128078ceb?w=400&q=80'],
                ['de' => 'Buch', 'article' => 'das', 'fr' => 'le livre', 'categorie' => 'Habitat', 'img' => 'https://images.unsplash.com/photo-1507842217343-583f20270319?w=400&q=80'],
                ['de' => 'Fenster', 'article' => 'das', 'fr' => 'la fenêtre', 'categorie' => 'Habitat', 'img' => 'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=400&q=80'],
                ['de' => 'Haus', 'article' => 'das', 'fr' => 'la maison', 'categorie' => 'Habitat', 'img' => 'https://images.unsplash.com/photo-1518780664697-55e3ad937233?w=400&q=80'],
                ['de' => 'Lampe', 'article' => 'die', 'fr' => 'la lampe', 'categorie' => 'Habitat', 'img' => 'https://images.unsplash.com/photo-1565636192335-14c46fa1120d?w=400&q=80'],
                ['de' => 'Stuhl', 'article' => 'der', 'fr' => 'la chaise', 'categorie' => 'Habitat', 'img' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&q=80'],
                ['de' => 'Tisch', 'article' => 'der', 'fr' => 'la table', 'categorie' => 'Habitat', 'img' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w=400&q=80'],
                ['de' => 'Tür', 'article' => 'die', 'fr' => 'la porte', 'categorie' => 'Habitat', 'img' => 'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?w=400&q=80'],
                // Nature — sorted A-Z
                ['de' => 'Berg', 'article' => 'der', 'fr' => 'la montagne', 'categorie' => 'Nature', 'img' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=400&q=80'],
                ['de' => 'Blume', 'article' => 'die', 'fr' => 'la fleur', 'categorie' => 'Nature', 'img' => 'https://images.unsplash.com/photo-1563822249366-3efb23b8e0c9?w=400&q=80'],
                ['de' => 'Meer', 'article' => 'das', 'fr' => 'la mer', 'categorie' => 'Nature', 'img' => 'https://images.unsplash.com/photo-1510414842594-a61c69b5ae57?w=400&q=80'],
                ['de' => 'Schnee', 'article' => 'der', 'fr' => 'la neige', 'categorie' => 'Nature', 'img' => 'https://images.unsplash.com/photo-1516912481808-3406841bd33c?w=400&q=80'],
                // Nourriture — sorted A-Z
                ['de' => 'Apfel', 'article' => 'der', 'fr' => 'la pomme', 'categorie' => 'Nourriture', 'img' => 'https://images.unsplash.com/photo-1553361371-9b22f78e8b1d?w=400&q=80'],
                ['de' => 'Brot', 'article' => 'das', 'fr' => 'le pain', 'categorie' => 'Nourriture', 'img' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=400&q=80'],
                ['de' => 'Ei', 'article' => 'das', 'fr' => "l'œuf", 'categorie' => 'Nourriture', 'img' => 'https://images.unsplash.com/photo-1569718212e3-3a52a5848def?w=400&q=80'],
                ['de' => 'Käse', 'article' => 'der', 'fr' => 'le fromage', 'categorie' => 'Nourriture', 'img' => 'https://images.unsplash.com/photo-1452899150238-b4146b39b56e?w=400&q=80'],
                ['de' => 'Milch', 'article' => 'die', 'fr' => 'le lait', 'categorie' => 'Nourriture', 'img' => 'https://images.unsplash.com/photo-1563636619-e7db3814b5df?w=400&q=80'],
                ['de' => 'Wurst', 'article' => 'die', 'fr' => 'la saucisse', 'categorie' => 'Nourriture', 'img' => 'https://images.unsplash.com/photo-1555939594-58d7cb561c1a?w=400&q=80'],
                // Objets — sorted A-Z
                ['de' => 'Schlüssel', 'article' => 'der', 'fr' => 'la clé', 'categorie' => 'Objets', 'img' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80'],
                ['de' => 'Stift', 'article' => 'der', 'fr' => 'le stylo', 'categorie' => 'Objets', 'img' => 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&q=80'],
                ['de' => 'Tasche', 'article' => 'die', 'fr' => 'le sac', 'categorie' => 'Objets', 'img' => 'https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=400&q=80'],
                ['de' => 'Uhr', 'article' => 'die', 'fr' => "l'horloge", 'categorie' => 'Objets', 'img' => 'https://images.unsplash.com/photo-1508057198894-247b23fe5ade?w=400&q=80'],
                // Transport — sorted A-Z
                ['de' => 'Auto', 'article' => 'das', 'fr' => 'la voiture', 'categorie' => 'Transport', 'img' => 'https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=400&q=80'],
                ['de' => 'Fahrrad', 'article' => 'das', 'fr' => 'le vélo', 'categorie' => 'Transport', 'img' => 'https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400&q=80'],
                ['de' => 'Flugzeug', 'article' => 'das', 'fr' => "l'avion", 'categorie' => 'Transport', 'img' => 'https://images.unsplash.com/photo-1540962351504-b8176674ae4e?w=400&q=80'],
                ['de' => 'Schiff', 'article' => 'das', 'fr' => 'le bateau', 'categorie' => 'Transport', 'img' => 'https://images.unsplash.com/photo-1544551763-92ab472cad5d?w=400&q=80'],
                ['de' => 'Zug', 'article' => 'der', 'fr' => 'le train', 'categorie' => 'Transport', 'img' => 'https://images.unsplash.com/photo-1494976388531-d1058494cdd0?w=400&q=80'],
                // Vêtements — sorted A-Z
                ['de' => 'Hemd', 'article' => 'das', 'fr' => 'la chemise', 'categorie' => 'Vêtements', 'img' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=400&q=80'],
                ['de' => 'Hose', 'article' => 'die', 'fr' => 'le pantalon', 'categorie' => 'Vêtements', 'img' => 'https://images.unsplash.com/photo-1542272604-787c62d465d1?w=400&q=80'],
                ['de' => 'Hut', 'article' => 'der', 'fr' => 'le chapeau', 'categorie' => 'Vêtements', 'img' => 'https://images.unsplash.com/photo-1533021773390-260eda7ab6cb?w=400&q=80'],
                ['de' => 'Rock', 'article' => 'der', 'fr' => 'la jupe', 'categorie' => 'Vêtements', 'img' => 'https://images.unsplash.com/photo-1591195853828-11db59a44f6b?w=400&q=80'],
                ['de' => 'Schuh', 'article' => 'der', 'fr' => 'la chaussure', 'categorie' => 'Vêtements', 'img' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&q=80'],
                // Jours — sorted A-Z
                ['de' => 'Dienstag', 'article' => 'der', 'fr' => 'mardi', 'categorie' => 'Jours', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=80'],
                ['de' => 'Donnerstag', 'article' => 'der', 'fr' => 'jeudi', 'categorie' => 'Jours', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=80'],
                ['de' => 'Freitag', 'article' => 'der', 'fr' => 'vendredi', 'categorie' => 'Jours', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=80'],
                ['de' => 'Mittwoch', 'article' => 'der', 'fr' => 'mercredi', 'categorie' => 'Jours', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=80'],
                ['de' => 'Montag', 'article' => 'der', 'fr' => 'lundi', 'categorie' => 'Jours', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=80'],
                ['de' => 'Samstag', 'article' => 'der', 'fr' => 'samedi', 'categorie' => 'Jours', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=80'],
                ['de' => 'Sonntag', 'article' => 'der', 'fr' => 'dimanche', 'categorie' => 'Jours', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=80'],
                // Heure
                ['de' => 'die Minute', 'article' => 'die', 'fr' => 'la minute', 'categorie' => 'Heure', 'img' => 'https://images.unsplash.com/photo-1508057198894-247b23fe5ade?w=400&q=80'],
                ['de' => 'die Stunde', 'article' => 'die', 'fr' => "l'heure", 'categorie' => 'Heure', 'img' => 'https://images.unsplash.com/photo-1508057198894-247b23fe5ade?w=400&q=80'],
                ['de' => 'Mittag', 'article' => 'der', 'fr' => 'le midi', 'categorie' => 'Heure', 'img' => 'https://images.unsplash.com/photo-1508057198894-247b23fe5ade?w=400&q=80'],
                ['de' => 'Mitternacht', 'article' => 'die', 'fr' => 'minuit', 'categorie' => 'Heure', 'img' => 'https://images.unsplash.com/photo-1508057198894-247b23fe5ade?w=400&q=80'],
                ['de' => 'Morgen', 'article' => 'der', 'fr' => 'le matin', 'categorie' => 'Heure', 'img' => 'https://images.unsplash.com/photo-1508057198894-247b23fe5ade?w=400&q=80'],
                ['de' => 'Nacht', 'article' => 'die', 'fr' => 'la nuit', 'categorie' => 'Heure', 'img' => 'https://images.unsplash.com/photo-1508057198894-247b23fe5ade?w=400&q=80'],
                // Météo — sorted A-Z
                ['de' => 'der Regen', 'article' => 'der', 'fr' => 'la pluie', 'categorie' => 'Météo', 'img' => 'https://images.unsplash.com/photo-1519692933481-e162a57d6721?w=400&q=80'],
                ['de' => 'der Wind', 'article' => 'der', 'fr' => 'le vent', 'categorie' => 'Météo', 'img' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=80'],
                ['de' => 'die Sonne', 'article' => 'die', 'fr' => 'le soleil', 'categorie' => 'Météo', 'img' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=400&q=80'],
                ['de' => 'heiß', 'article' => null, 'fr' => 'chaud', 'categorie' => 'Météo', 'img' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=400&q=80'],
                ['de' => 'kalt', 'article' => null, 'fr' => 'froid', 'categorie' => 'Météo', 'img' => 'https://images.unsplash.com/photo-1516912481808-3406841bd33c?w=400&q=80'],
                // Saisons — sorted A-Z
                ['de' => 'Frühling', 'article' => 'der', 'fr' => 'le printemps', 'categorie' => 'Saisons', 'img' => 'https://images.unsplash.com/photo-1563822249366-3efb23b8e0c9?w=400&q=80'],
                ['de' => 'Herbst', 'article' => 'der', 'fr' => "l'automne", 'categorie' => 'Saisons', 'img' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=400&q=80'],
                ['de' => 'Sommer', 'article' => 'der', 'fr' => "l'été", 'categorie' => 'Saisons', 'img' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=400&q=80'],
                ['de' => 'Winter', 'article' => 'der', 'fr' => "l'hiver", 'categorie' => 'Saisons', 'img' => 'https://images.unsplash.com/photo-1516912481808-3406841bd33c?w=400&q=80'],
            ],
        ],
        [
            'slug' => 'mots-essentiels',
            'titre' => 'Mots Essentiels',
            'sur_titre' => 'NIVEAU ZÉRO',
            'description' => 'Les mots les plus fréquents pour communiquer au quotidien.',
            'template_vue' => 'quotidien',
            'couleur_theme' => '#b45309',
            'ordre' => 7,
            'lecons' => [
                // Corps — sorted A-Z
                ['de' => 'Auge', 'article' => 'das', 'fr' => "l'œil", 'categorie' => 'Corps', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80'],
                ['de' => 'Hand', 'article' => 'die', 'fr' => 'la main', 'categorie' => 'Corps', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80'],
                ['de' => 'Kopf', 'article' => 'der', 'fr' => 'la tête', 'categorie' => 'Corps', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80'],
                ['de' => 'Nase', 'article' => 'die', 'fr' => 'le nez', 'categorie' => 'Corps', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80'],
                ['de' => 'Ohr', 'article' => 'das', 'fr' => "l'oreille", 'categorie' => 'Corps', 'img' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&q=80'],
                // Verbes essentiels
                ['de' => 'essen', 'article' => null, 'fr' => 'manger', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1490645935967-10de6ba17061?w=400&q=80'],
                ['de' => 'gehen', 'article' => null, 'fr' => 'aller / marcher', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=400&q=80'],
                ['de' => 'haben', 'article' => null, 'fr' => 'avoir', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1507842217343-583f20270319?w=400&q=80'],
                ['de' => 'kommen', 'article' => null, 'fr' => 'venir', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=400&q=80'],
                ['de' => 'machen', 'article' => null, 'fr' => 'faire', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1507842217343-583f20270319?w=400&q=80'],
                ['de' => 'sagen', 'article' => null, 'fr' => 'dire', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1507842217343-583f20270319?w=400&q=80'],
                ['de' => 'schlafen', 'article' => null, 'fr' => 'dormir', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1540932239986-310128078ceb?w=400&q=80'],
                ['de' => 'sein', 'article' => null, 'fr' => 'être', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1507842217343-583f20270319?w=400&q=80'],
                ['de' => 'sprechen', 'article' => null, 'fr' => 'parler', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1507842217343-583f20270319?w=400&q=80'],
                ['de' => 'trinken', 'article' => null, 'fr' => 'boire', 'categorie' => 'Verbes', 'img' => 'https://images.unsplash.com/photo-1563636619-e7db3814b5df?w=400&q=80'],
                // Adjectifs
                ['de' => 'alt', 'article' => null, 'fr' => 'vieux', 'categorie' => 'Adjectifs', 'img' => 'https://images.unsplash.com/photo-1507842217343-583f20270319?w=400&q=80'],
                ['de' => 'gut', 'article' => null, 'fr' => 'bon / bien', 'categorie' => 'Adjectifs', 'img' => 'https://images.unsplash.com/photo-1563822249366-3efb23b8e0c9?w=400&q=80'],
                ['de' => 'groß', 'article' => null, 'fr' => 'grand', 'categorie' => 'Adjectifs', 'img' => 'https://images.unsplash.com/photo-1501854140801-50d01698950b?w=400&q=80'],
                ['de' => 'klein', 'article' => null, 'fr' => 'petit', 'categorie' => 'Adjectifs', 'img' => 'https://images.unsplash.com/photo-1553361371-9b22f78e8b1d?w=400&q=80'],
                ['de' => 'neu', 'article' => null, 'fr' => 'nouveau', 'categorie' => 'Adjectifs', 'img' => 'https://images.unsplash.com/photo-1563822249366-3efb23b8e0c9?w=400&q=80'],
                ['de' => 'schön', 'article' => null, 'fr' => 'beau', 'categorie' => 'Adjectifs', 'img' => 'https://images.unsplash.com/photo-1563822249366-3efb23b8e0c9?w=400&q=80'],
                ['de' => 'schlecht', 'article' => null, 'fr' => 'mauvais', 'categorie' => 'Adjectifs', 'img' => 'https://images.unsplash.com/photo-1519692933481-e162a57d6721?w=400&q=80'],
            ],
        ],
    ];

    public function run(): void
    {
        $parcours = Parcours::where('slug', 'niveau-zero')->firstOrFail();

        foreach (self::$chapitres as $chapitreData) {
            $lecons = $chapitreData['lecons'];
            unset($chapitreData['lecons']);

            $chapitre = Chapitre::firstOrCreate(
                ['slug' => $chapitreData['slug'], 'parcours_id' => $parcours->id],
                array_merge($chapitreData, ['parcours_id' => $parcours->id])
            );

            foreach ($lecons as $i => $item) {
                Lecon::updateOrCreate(
                    ['chapitre_id' => $chapitre->id, 'mot_allemand' => $item['de']],
                    [
                        'article' => $item['article'] ?? null,
                        'traduction_francaise' => $item['fr'],
                        'image_url' => $item['img'] ?? null,
                        'categorie' => $item['categorie'] ?? null,
                        'ordre' => $i + 1,
                    ]
                );
            }
        }
    }
}
