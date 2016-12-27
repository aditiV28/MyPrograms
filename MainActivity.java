package com.example.admin.bellezatimes;


import android.app.Fragment;
import android.app.FragmentTransaction;

import android.view.View;
import android.content.Intent;
import android.content.SharedPreferences;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;

public class MainActivity extends AppCompatActivity {
        private SharedPreferences preferences;
    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        preferences = getPreferences(0);
        initFragment();



    }

    private void initFragment(){
        Fragment fragment;
        if(preferences.getBoolean(Constants.IS_LOGGED_IN,false)){
            fragment = new FeedPage();
        }
        else {
            fragment = new LoginActivity();
        }

        FragmentTransaction fragmentTransaction = getFragmentManager().beginTransaction();
        fragmentTransaction.replace(R.id.fragment_frame,fragment);
        fragmentTransaction.commit();

    }

    /*@Override
    public boolean onCreateOptionsMenu(Menu menu){
        getMenuInflater().inflate(R.menu.activity_main,menu);
        return true;
    }*/
}
