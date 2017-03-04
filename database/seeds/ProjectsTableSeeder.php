<?php

use Illuminate\Database\Seeder;
use \App\Projects;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for($i=0;$i<20;$i++) {
            if($i%2)
                $flag=true;
            else
                $flag=false;
            $project = new Projects();
            $project->name = $faker->domainName;
            $project->technology = 'composer,php,Laravel,bootstrap';
            $project->user_id = 1;
            $project->project_start = $faker->date('Y/m/d', '2018/01/01');
            if($flag === true)
                $project->project_end = $faker->date('Y/m/d', '2020/01/01');
            $project->time = $faker->numberBetween(3600, 214748364);
            $project->deadline = $faker->date('Y/m/d', '2020/01/01');
            $project->save();
        }

        $project = new Projects();
        $project->name='Serwis pocztowy';
        $project->technology='composer,php,Laravel,bootstrap';
        $project->user_id=1;
        $project->project_start=$faker->date('Y/m/d','2018/01/01');
        $project->project_end=$faker->date('Y/m/d','2020/01/01');
        $project->time=$faker->numberBetween(3600,214748364);
        $project->deadline=$faker->date('Y/m/d','2020/01/01');
        $project->save();

        $project = new Projects();
        $project->name='System zarządzania firmą';
        $project->technology='maven,java,Spring';
        $project->user_id=1;
        $project->project_start=$faker->date('Y/m/d','2018/01/01');
        $project->deadline=$faker->date('Y/m/d','2020/01/01');
        $project->save();

        $project = new Projects();
        $project->name='Praca inzynierska: serwis hostingowy stron www';
        $project->technology='composer,php,Laravel,bootstrap';
        $project->user_id=1;
        $project->project_start=$faker->date('Y/m/d','2018/01/01');
        $project->deadline=$faker->date('Y/m/d','2020/01/01');
        $project->save();

        $project = new Projects();
        $project->name='Projekt małego robota';
        $project->technology='Ardiuno';
        $project->user_id=1;
        $project->project_start=$faker->date('Y/m/d','2018/01/01');
        $project->project_end=$faker->date('Y/m/d','2020/01/01');
        $project->time=$faker->numberBetween(3600,214748364);
        $project->save();

        $project = new Projects();
        $project->name='Stoper';
        $project->technology='javascript';
        $project->user_id=1;
        $project->project_start=$faker->date('Y/m/d','2018/01/01');
        $project->project_end=$faker->date('Y/m/d','2020/01/01');
        $project->time=$faker->numberBetween(3600,214748364);
        $project->deadline=$faker->date('Y/m/d','2020/01/01');
        $project->save();

    }
}
