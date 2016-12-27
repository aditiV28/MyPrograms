package com.example.admin.bellezatimes;

/*
 * Created by ADMIN on 01-12-2016.
 */
import android.app.AlertDialog;
import android.app.Fragment;
import android.app.FragmentTransaction;
import android.content.DialogInterface;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.widget.Toast;
import android.support.v7.widget.AppCompatButton;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.TextView;


import com.example.admin.bellezatimes.ServerRequest;
import com.example.admin.bellezatimes.ServerResponse;
import com.example.admin.bellezatimes.User;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class FeedPage extends Fragment implements View.OnClickListener{
    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        View view = inflater.inflate(R.layout.feed_activity,container,false);
        initViews(view);
        return view;
    }

    private void initViews(View view){


    }
    @Override
    public void onClick(View v) {



        }
    }





