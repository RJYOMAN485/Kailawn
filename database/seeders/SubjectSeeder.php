<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'grade_id' => 4,
                'name' => 'ARTS',
            ],
            [
                'grade_id' => 4,
                'name' => 'SCIENCE',
            ],
            [
                'grade_id' => 4,
                'name' => 'COMMERCE',
            ],
            [
                'grade_id' => 4,
                'name' => 'VOCATIONAL',
            ],
            [
                'grade_id' => 5,
                'name' => 'B.ARCH.'
            ],
            [
                'grade_id' => 5,
                'name' => 'BBA'
            ],
            [
                'grade_id' => 5,
                'name' => 'B.COM'
            ],
            [
                'grade_id' => 5,
                'name' => 'BD(THEOLOGY)'
            ],
            [
                'grade_id' => 5,
                'name' => 'BDS'
            ],
            [
                'grade_id' => 5,
                'name' => 'B.ED '
            ],
            [
                'grade_id' => 5,
                'name' => 'BFA'
            ],
            [
                'grade_id' => 5,
                'name' => 'BFS'
            ],
            [
                'grade_id' => 5,
                'name' => 'BHMS'
            ],
            [
                'grade_id' => 5,
                'name' => 'B.LIB'
            ],
            [
                'grade_id' => 5,
                'name' => 'B.PHARM'
            ],
            [
                'grade_id' => 5,
                'name' => 'B.TH'
            ],
            [
                'grade_id' => 5,
                'name' => 'B.V.SC'
            ],
            [
                'grade_id' => 5,
                'name' => 'BACHELOR IN PLANNING'
            ],
            [
                'grade_id' => 5,
                'name' => 'BACHELOR IN TRAUMA EMERGENCY CARE & DISASTER MANAGEMENT'
            ],
            [
                'grade_id' => 5,
                'name' => 'BACHELOR OF DESIGN'
            ],
            [
                'grade_id' => 5,
                'name' => 'BACHELOR OF OCCUPATIONAL THERAPY'
            ],
            [
                'grade_id' => 5,
                'name' => 'BACHELOR OF PHYSIOTHERAPY'
            ],
            [
                'grade_id' => 5,
                'name' => 'BAMS (AYURVEDIC)'
            ],
            [
                'grade_id' => 5,
                'name' => 'BBM'
            ],
            [
                'grade_id' => 5,
                'name' => 'BCA'
            ],
            [
                'grade_id' => 5,
                'name' => 'BSW'
            ],
            [
                'grade_id' => 5,
                'name' => 'BVS & AH'
            ],
            [
                'grade_id' => 5,
                'name' => 'Dr. of pharmacy'
            ],
            [
                'grade_id' => 5,
                'name' => 'GRADUATES (BHTM)'
            ],
            [
                'grade_id' => 5,
                'name' => 'LLB'
            ],
            [
                'grade_id' => 5,
                'name' => 'MBBS'
            ],
            [
                'grade_id' => 5,
                'name' => 'BA'
            ],
            [
                'grade_id' => 5,
                'name' => 'BE/B.TECH'
            ],
            [
                'grade_id' => 5,
                'name' => 'B.SC'
            ],
            [
                'grade_id' => 5,
                'name' => 'B.Ed'
            ],
            [
                'grade_id' => 5,
                'name' => 'BLIS'
            ],
            [
                'grade_id' => 6,
                'name' => 'Doctor of Medicine (M.D)',
            ],
            [
                'grade_id' => 6,
                'name' => 'LLM',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.A',
            ],
            [
                'grade_id' => 6,
                'name' => 'MBA',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.COM',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.E/M.Tech',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.Ed',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.F.Sc. (Fisheries)',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.L.M',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.Lib.Science',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.Pharm',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.Phil',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.Sc',
            ],
            [
                'grade_id' => 6,
                'name' => 'M.V.Sc',
            ],
            [
                'grade_id' => 6,
                'name' => 'Master of Design (Design Space)',
            ],
            [
                'grade_id' => 6,
                'name' => 'Master of Fashion Management',
            ],
            [
                'grade_id' => 6,
                'name' => 'Master of Occupational Therapy',
            ],
            [
                'grade_id' => 6,
                'name' => 'Master of Physiotherapy',
            ],
            [
                'grade_id' => 6,
                'name' => 'Master of Planning',
            ],
            [
                'grade_id' => 6,
                'name' => 'Master of Surgery (M.S)',
            ],
            [
                'grade_id' => 6,
                'name' => 'Master of Tourism Administration (MTA)',
            ],
            [
                'grade_id' => 6,
                'name' => 'MCA',
            ],
            [
                'grade_id' => 6,
                'name' => 'MCM',
            ],
            [
                'grade_id' => 6,
                'name' => 'MDS',
            ],
            [
                'grade_id' => 6,
                'name' => 'MHA',
            ],
            [
                'grade_id' => 6,
                'name' => 'MSW',
            ],
            [
                'grade_id' => 7,
                'name' => 'ANM'
            ],
            [
                'grade_id' => 7,
                'name' => 'ARTISIAN'
            ],
            [
                'grade_id' => 7,
                'name' => 'AUTOMOBILE MECHANIC'
            ],
            [
                'grade_id' => 7,
                'name' => 'BACHELOR IN AUDIO & SPEECH LANGUANGE PATHOLOGY'
            ],
            [
                'grade_id' => 7,
                'name' => 'BAKERY & CONFECTIONNARY'
            ],
            [
                'grade_id' => 7,
                'name' => 'BASIC AGRI TRAINER'
            ],
            [
                'grade_id' => 7,
                'name' => 'BEAUTICIAN'
            ],
            [
                'grade_id' => 7,
                'name' => 'BT'
            ],
            [
                'grade_id' => 7,
                'name' => 'C.A.ED'
            ],
            [
                'grade_id' => 7,
                'name' => 'CAMERAMEN'
            ],
            [
                'grade_id' => 7,
                'name' => 'CARPENTER'
            ],
            [
                'grade_id' => 7,
                'name' => 'CEMENT OLISTIN'
            ],
            [
                'grade_id' => 7,
                'name' => 'CERTIFICATE COURSE IN LAB TECHNOLOGY'
            ],
            [
                'grade_id' => 7,
                'name' => 'CERTIFICATE COURSE IN COMPUTER APPLICATION (CCA)'
            ],
            [
                'grade_id' => 7,
                'name' => 'CINEMA OPERATOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN ARCHITECTURAL ASSISTANT'
            ],
            [
                'grade_id' => 7,
                'name' => 'COMPUTER OPERATOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'COMPUTER SOFTWARE'
            ],
            [
                'grade_id' => 7,
                'name' => 'CONDUCTOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'COPA'
            ],
            [
                'grade_id' => 7,
                'name' => 'DANCE INSTRUCTOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'DEMONSTRATOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'DENTAL LABORATORY TECHNICIAN'
            ],
            [
                'grade_id' => 7,
                'name' => 'DESIGNER GARMENTS'
            ],
            [
                'grade_id' => 7,
                'name' => 'DESKTOP PUBLISHING'
            ],
            [
                'grade_id' => 7,
                'name' => 'DESPATCH RIDER'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIALYSIS TECHNICIAN'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIESEL MECHANIC'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIETTICIAN'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN AGRICULTURAL ENGINEERING'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN ARCHITECH'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN ARCHITECTURAL ASSISTANSHIP'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN GARMENT TECH.'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN AVIATION & HOSPITALITY MANAGEMENT'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN BUSINESS MANAGEMENT'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN CIVIL ENGINEERING'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN COMMERCIAL PRACTISE'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN COMPUTER APPLICATION (DCA)'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN  COMPUTER SCIENCE'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN COMPUTER SCIENCE & ENGINEERING'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN CRAFTMANSHIP (FOOD PRODUCTION)'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN DIETETIC HEALTH NUTRITION'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN ELECTRICAL & ELECTRONICS'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN ELECTRICAL ENGINEERING'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN ELECTRONIC & TELECOMMUNICATION ENGINEER'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN ELEMENTARY COURSE OF AH & VETERINARY SCIENCE'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN ELEMENTARY EDUCATION'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN FILM & TV PRODUCTION'
            ],
            [
                'grade_id' => 7,
                'name' => 'ELECTRICAL ENGINEERING'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN HANDLOOM ENGINEERING'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN INFORMATION TECHNOLOGY'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN LABORATORY TECHNOLOGY'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN MECHANICAL ENGINEERING'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN PHARMACY'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN RADIO DIAGNOSTIC TECHNOLOGY'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN SANITARY INSPECTOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN TEACHERS EDUCATION (PRIMARY SCHOOL TEACHER)'
            ],
            [
                'grade_id' => 7,
                'name' => 'DIPLOMA IN TOURISM (INTERNATIONAL AIRLINES & TRAVEL)'
            ],
            [
                'grade_id' => 7,
                'name' => 'DOCTOR OF PHARMACISIS'
            ],
            [
                'grade_id' => 7,
                'name' => 'DRAMA INSTRUCTOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'DRAUGHTSMAN (ITI)'
            ],
            [
                'grade_id' => 7,
                'name' => 'DRIVER (HEAVY & LIGHT)'
            ],
            [
                'grade_id' => 7,
                'name' => 'DRIVER (HEAVY)'
            ],
            [
                'grade_id' => 7,
                'name' => 'DRIVER (LIGHT)'
            ],
            [
                'grade_id' => 7,
                'name' => 'ECG TECHNICIAN'
            ],
            [
                'grade_id' => 7,
                'name' => 'LABORATORY ASSISTANT'
            ],
            [
                'grade_id' => 7,
                'name' => 'ELECTRICIAN'
            ],
            [
                'grade_id' => 7,
                'name' => 'ELECTRONIC TECHNICIAN'
            ],
            [
                'grade_id' => 7,
                'name' => 'ELECTRONICS MECHANIC'
            ],
            [
                'grade_id' => 7,
                'name' => 'FASHION DESIGNER'
            ],
            [
                'grade_id' => 7,
                'name' => 'FITTER'
            ],
            [
                'grade_id' => 7,
                'name' => 'GNM'
            ],
            [
                'grade_id' => 7,
                'name' => 'GRAM SEVAK'
            ],
            [
                'grade_id' => 7,
                'name' => 'GRAPHIC DESIGNER'
            ],
            [
                'grade_id' => 7,
                'name' => 'HAIR & SKIN CARE'
            ],
            [
                'grade_id' => 7,
                'name' => 'HEALTH WORKER'
            ],
            [
                'grade_id' => 7,
                'name' => 'HOSPITALITY & TOURISM MANAGEMENT'
            ],
            [
                'grade_id' => 7,
                'name' => 'HOTEL MANAGEMENT CATERING'
            ],
            [
                'grade_id' => 7,
                'name' => 'INFORMATION TECHNOLOGY & ELECTRONICS'
            ],
            [
                'grade_id' => 7,
                'name' => 'INTERIOR DESIGNER'
            ],
            [
                'grade_id' => 7,
                'name' => 'IT & ELECTRONIC SYSTEM MAINTENANCE'
            ],
            [
                'grade_id' => 7,
                'name' => 'PLUMBER'
            ],
            [
                'grade_id' => 7,
                'name' => 'MEDICAL RECORD TECHNOLOGY'
            ],
            [
                'grade_id' => 7,
                'name' => 'MODERN OFFICE PRACTICE (MOP)'
            ],
            [
                'grade_id' => 7,
                'name' => 'MOTOR MECHANIC'
            ],
            [
                'grade_id' => 7,
                'name' => 'NIS DIPLOMA (BADMINTON)'
            ],
            [
                'grade_id' => 7,
                'name' => 'NIS COACHING'
            ],
            [
                'grade_id' => 7,
                'name' => 'OPTHALMIC ASSISTANT'
            ],
            [
                'grade_id' => 7,
                'name' => 'ORIENTAL OF MOBILITY'
            ],
            [
                'grade_id' => 7,
                'name' => 'PG DIPLOMA ADVERTISING & PR'
            ],
            [
                'grade_id' => 7,
                'name' => 'PG DIPLOMA IN E-ACCOUNTING AND FINANCING MANAGEMENT'
            ],
            [
                'grade_id' => 7,
                'name' => 'PG DIPLOMA IN HUMAN RESOURCE MANAGEMENT'
            ],
            [
                'grade_id' => 7,
                'name' => 'PG DIPLOMA IN TOURISM MANAGEMENT'
            ],
            [
                'grade_id' => 7,
                'name' => 'PG DIPLOMA IN URBAN PLANNING AND DEVELOPMENT'
            ],
            [
                'grade_id' => 7,
                'name' => 'PGDCA'
            ],
            [
                'grade_id' => 7,
                'name' => 'PHOTOGRAPHY'
            ],
            [
                'grade_id' => 7,
                'name' => 'PHYSICAL TRAINING INSTRUCTOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'PILOT (AIRLINES)'
            ],
            [
                'grade_id' => 7,
                'name' => 'TOURISM MANAGEMENT'
            ],
            [
                'grade_id' => 7,
                'name' => 'PRE SERVICE TRAINING'
            ],
            [
                'grade_id' => 7,
                'name' => 'PRINTER'
            ],
            [
                'grade_id' => 7,
                'name' => 'PRINTING TECHNOLOGY'
            ],
            [
                'grade_id' => 7,
                'name' => 'RADIO & TV MECHANIC/ELECTRONICS'
            ],
            [
                'grade_id' => 7,
                'name' => 'RADIOTHERAPY TECHNOLOGY'
            ],
            [
                'grade_id' => 7,
                'name' => 'REFRIGERATOR & AIR CONDITIONING MECHANIC'
            ],
            [
                'grade_id' => 7,
                'name' => 'REHABILITATION THERAPIST'
            ],
            [
                'grade_id' => 7,
                'name' => 'RICIT'
            ],
            [
                'grade_id' => 7,
                'name' => 'SANITARY INSPECTOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'SPORTS COACH'
            ],
            [
                'grade_id' => 7,
                'name' => 'STENOGRAPHER'
            ],
            [
                'grade_id' => 7,
                'name' => 'STERILIZE SERVICE'
            ],
            [
                'grade_id' => 7,
                'name' => 'SURVEYOR'
            ],
            [
                'grade_id' => 7,
                'name' => 'TAILORING'
            ],
            [
                'grade_id' => 7,
                'name' => 'TEXTILE TECHNOLOGY'
            ],
            [
                'grade_id' => 7,
                'name' => 'TINSMITHY'
            ],
            [
                'grade_id' => 7,
                'name' => 'X RAY TECHNICIAN'
            ],
            [
                'grade_id' => 7,
                'name' => 'TURNER'
            ],
            [
                'grade_id' => 7,
                'name' => 'TYPING'
            ],
            [
                'grade_id' => 7,
                'name' => 'TYRE TUBE REPAIRING'
            ],
            [
                'grade_id' => 7,
                'name' => 'UMPIRE'
            ],
            [
                'grade_id' => 7,
                'name' => 'VFA'
            ],
            [
                'grade_id' => 7,
                'name' => 'VFA, VACCINATOR, VETERINARY'
            ],
            [
                'grade_id' => 7,
                'name' => 'WEAVING'
            ],
            [
                'grade_id' => 7,
                'name' => 'WELDER'
            ],
            [
                'grade_id' => 7,
                'name' => 'WELDER ELECTRIC'
            ],
            [
                'grade_id' => 7,
                'name' => 'WIREMAN'
            ],
            [
                'grade_id' => 8,
                'name' => 'MATRIC'
            ],
            [
                'grade_id' => 8,
                'name' => 'PU'
            ],
            [
                'grade_id' => 8,
                'name' => 'BA'
            ],
            [
                'grade_id' => 8,
                'name' => 'MA'
            ],
            [
                'grade_id' => 8,
                'name' => 'B.ed'
            ],
            [
                'grade_id' => 8,
                'name' => 'M.ed'
            ],
            [
                'grade_id' => 8,
                'name' => 'Diploma in Hindi ShikShak'
            ],
        ];

        Subject::truncate();

        Subject::query()->upsert($subjects, 'name');
    }
}
