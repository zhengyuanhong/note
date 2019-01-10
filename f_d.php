<?php

function feedback(Request $request)
    {
        if(Cache::lock('user_feedbacks',3)->get()){
            // 参数验证
            $validator = Validator::make($request->all(), [
                'content' => 'required',
                'mobile' => 'nullable',
            ]);
            if ($validator->fails()) {
                return $this->error(ErrorCodes::E_PARAMS, $this->errorMessage($validator->errors()));
            }
            $input = $request->all();
            /** @var User $user */
            $user = $request->user;

            $feedback = new Feedback();
            $feedback->user_id = $user->id;
            $feedback->content = $input['content'];
            if (isset($input['mobile'])) {
                $feedback->mobile = $input['mobile'];
            }
            $feedback->save();

            Cache::lock('user_feedbacks')->release();
            return $this->result();
        }else{
            return $this->error(ErrorCodes::E_BUSY);
        }
    }
